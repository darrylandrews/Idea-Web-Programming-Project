<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Transaction;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login', ['check' => "Empty"]);
    }

    public function login(Request $request)
    {
        // setting remember if checked or not
        $remember = $request->remember ? true : false;

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        
        // getting inputed email and password
        $credential = $request->only('email', 'password'); 
        
        if(Auth::attempt($credential, $remember))
        {   
            Cookie::queue('usercookie','',0);
            Cookie::queue('passcookie','',0);

            // if users check the remember me
            if($remember == true)
            {
                // set auto input users data
                Cookie::queue('usercookie', "$request->email", 1440); // 1440 minutes = 24 hours
                Cookie::queue('passcookie', "$request->password", 1440);
            }
            
            $users = User::where('email', 'like', "$request->email")
                        ->first();

            $types = Type::all();   

            return view('main', ['users' => $users], ['types' => $types]);
        }
        else
        {
            return view('login', ['check' => "Error"]);
        }

    }

    public function logout()
    {
        Auth::logout(); // logs out user
        return redirect()->action([viewController::class, 'mainview']);
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $todayDate = date('Y/m/d'); // get current date

        $this->validate($request,[
            'Name' => 'required|min:6',
            'email' => 'required|unique:users,email',
            'password' => 'required|alpha_num|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'PasswordConfirmation' => 'required_with:password|same:password',
            'Birthday'  => 'required|date_format:Y-m-d|before:'.$todayDate,
            'Address' => 'required|min:10',
            'Gender' => 'required'
        ]);
        
        DB::table('users')->insert([
            ['role_id' => '2', 'name' => $request->Name, 'email' => $request->email, 'password' => bcrypt($request->password), 'address' => $request->Address, 'gender' => $request->Gender, 'dob' => $request->Birthday]
        ]); 

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential))
        {   
            $users = User::where('email', 'like', "$request->email")
                        ->first();

            $types = Type::all();   
            

            return view('main', ['users' => $users], ['types' => $types]);
        }
        else
        {
            return view('login', ['check' => "Error"]);
        }
        
        return redirect()->action([viewController::class, 'mainview']);
        
    }

    public function updateMPage()
    {
        return view('updateM');
    }
    
    public function updateM(Request $request)
    {
        $todayDate = date('Y/m/d');

        $this->validate($request,[
            'Name' => 'required|min:6',
            'Birthday'  => 'required|date_format:Y-m-d|before:'.$todayDate,
            'Address' => 'required|min:10',
            'Gender' => 'required'
        ]);
        
        DB::table('users')->where(['id' => Auth::user()->id])->update([
            'name' => $request->Name, 
            'dob'  => $request->Birthday,
            'address' => $request->Address,
            'gender' => $request->Gender
        ]);

        
        return redirect()->action([viewController::class, 'mainview']);
        
    }

}