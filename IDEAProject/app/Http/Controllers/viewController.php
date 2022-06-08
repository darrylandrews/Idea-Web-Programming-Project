<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Transaction;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class viewController extends Controller
{
    // To show Product Page
    public function itemview(Request $request)
    {
        $items = Item::where('type_id','like',"$request->id")
                ->where('name', 'like', "%$request->key%")
                ->paginate(10); // paginate to show only 10 items per page

        $type = Type::where('id', 'like', "$request->id")
                ->first();

        return view('product', ['items' => $items], ['type' => $type]);
    }

    // To show mainpage
    public function mainview()
    {
        $type = Type::all();

        return view('main', ['types' => $type]);
    }

    // To show add type page
    public function addTPage()
    {
        return view('addT');
    }

    // To insert new type to database
    public function addT(Request $request)
    {
        $this->validate($request,[
            'Name' => 'required|min:4|unique:types,type',
            'Image' => 'required|mimes:jpeg,gif,png,jpg'
        ]);
        
        $img = $request['Image'];
        $f_name = $img->getClientOriginalName();

        DB::table('types')->insert([
            ['type' => $request->Name, 'image' => "types/".$f_name]
        ]); 

        $img->move('types', $f_name);

        return redirect()->action([viewController::class, 'mainview']);
    }

    // To show update product type page
    public function updateTPage(Request $request)
    {
        
        $type = Type::where('id', 'like', "$request->id")
                ->first();    

        return view('updateT', ['type' => $type]);
    }

    // Tp update product type
    public function updateT(Request $request, $id)
    {
        $img = $request['Image'];

        $type = Type::find($id);
        if(empty($img))
        {
            $type->type = $request->Name;
        }
        else
        {
            $f_name = $img->getClientOriginalName();
            
            $type->type = $request->Name;
            $type->image = "types/".$f_name;

            $img->move('types', $f_name);
        }
        $type->save();

        return redirect()->action([viewController::class, 'mainview']);
    }

    // Deletes the product type
    public function deleteT(Request $request)
    {
        $type = Type::find($request->id);
        $type->delete();    
        return redirect()->action([viewController::class, 'mainview']);
    }

    // Shows add product page
    public function addPPage()
    {
        $types = Type::all();

        return view('addP', ['types' => $types]);
    }

    // To add new product
    public function addP(Request $request)
    {
        $this->validate($request,[
            'Name' => 'required|min:5',
            'TypeId' => 'exists:types,id',
            'Stock' => 'required|numeric|min:0|not_in:0',
            'Price' => 'required|numeric|min:0|not_in:0',
            'Description' => 'required|min:15',
            'Image' => 'nullable|mimes:jpeg,gif,png,jpg'
        ]);
        
        $img = $request['Image'];
        $f_name = $img->getClientOriginalName();
        
        DB::table('items')->insert([
            ['type_id' => $request->TypeId, 'name' =>$request->Name , 'image' => "images/".$f_name, 'stock' => $request->Stock, 'price' => $request->Price, 'description' => $request->Description]
        ]);

        $img->move('images', $f_name);

        return redirect()->action([viewController::class, 'mainview']);
    }

    // Show update product page
    public function updatePPage(Request $request)
    {
        $items = Item::where('id', 'like', "$request->id")
                ->first();    
        
        $types = Type::all();

        return view('updateP', ['items' => $items], ['types' => $types]);
    }

    // update product
    public function updateP(Request $request, $id)
    {
        $this->validate($request,[
            'Name' => 'required|min:5',
            'Stock' => 'required|numeric|min:0|not_in:0',
            'Price' => 'required|numeric|min:0|not_in:0',
            'Description' => 'required|min:15',
            'Image' => 'nullable|mimes:jpeg,gif,png,jpg'
        ]);

        $img = $request['Image'];

        $items = Item::find($id);
        if(empty($img))
        {
            $items->name = $request->Name;
            $items->type_id = $request->TypeId;
            $items->stock = $request->Stock;
            $items->price = $request->Price;
            $items->description = $request->Description;
        }
        else
        {
            
            $f_name = $img->getClientOriginalName();
            
            $items->name = $request->Name;
            $items->type_id = $request->TypeId;
            $items->stock = $request->Stock;
            $items->price = $request->Price;
            $items->description = $request->Description;
            $items->image = "images/".$f_name;

            $img->move('images', $f_name);
        }
        $items->save();

        return redirect()->action([viewController::class, 'mainview']);
    }

    public function deleteP(Request $request)
    {
        $items = Item::find($request->id);
        $items->delete();    
        return redirect()->action([viewController::class, 'mainview']);
    }

    public function productDetailsView(Request $request)
    {
        $items = Item::where('id', 'like', "$request->id")
            ->first();    

        return view('detailsP', ['item' => $items]);
    }

    public function productDetails(Request $request)
    {

        $items = Item::where('id', 'like', "$request->id")
            ->first(); 

        $Purc = $request->Purchase;
        $Quantity = $items['stock'];

        $this->validate($request,[
            'Purchase' => "required|numeric|min:1|max:$Quantity"
        ]);

        $itemId = $items['id'];
        $price = $items['price'];
        $subtotal = $price * $Purc;
        $userId = Auth::user()->id;
        $AddtoCart = $Quantity - $Purc;
        
        $carts = Cart::where('item_id', 'like', "$request->id")
                    ->where('user_id', 'like', "$userId")
                    ->first();
    
        if($carts == [])
        {
            DB::table('carts')->insert([
                ['user_id' => $userId, 'item_id' =>$itemId , 'quantity' => $Purc, 'price' => $price, 'subtotal' => $subtotal]
            ]);       
        }
        else
        {
            
            $newqty = $Purc;
            $newsub = $price * $newqty;


            DB::table('carts')->where(['user_id' => $userId, 'item_id' => $itemId])->update([
                'quantity' => $newqty,
                'subtotal' => $newsub
            ]);
        }
        
        return redirect()->action([viewController::class, 'mainview']);
    }

    public function shoppingCart()
    {
        
        $userId = Auth::user()->id;
        $carts = Cart::where('user_id', 'like', "$userId")
            ->get(); 


        $grandTotal = 0;
        foreach($carts as $cart)
        {
            $grandTotal += $cart->subtotal;
        }

        if($carts->isEmpty())
        {
            $carts = null;
        }
        
        return(view('cart', ['carts' => $carts], ['grandtotal' => $grandTotal]));
    }

    public function shoppingCartUpdate(Request $request, $id)
    {
        $userId = Auth::user()->id;

        $items = Item::where('id', 'like', "$id")
            ->first(); 

        $carts = Cart::where('user_id', 'like', "$userId")
            ->get();

        $newqty = $request->quantity;
        $Quantity = $items['stock'];

        $this->validate($request,[
            'quantity' => "required|numeric|min:1|max:$Quantity"
        ]);

        
        $newsub = $items['price'] * $newqty;

        DB::table('carts')->where(['user_id' => $userId, 'item_id' => $id])->update([
            'quantity' => $newqty,
            'subtotal' => $newsub
        ]);

        return redirect()->action([viewController::class, 'shoppingCart']);
    }

    public function cartD(Request $request)
    {
        $userId = Auth::user()->id;

        DB::table('carts')->where(['user_id' => $userId, 'item_id' => $request->id])
            ->delete();

        return redirect()->action([viewController::class, 'shoppingCart']);
    }

    public function transaction()
    {
        $userId = Auth::user()->id;

        $carts = Cart::where('user_id', 'like', "$userId")
            ->get(); 

        $grandTotal = 0;
        foreach($carts as $cart)
        {
            if($cart->quantity > $cart->item->stock)
            {
                return redirect()->action([viewController::class, 'shoppingCart']);
            }
            else
            {
                $grandTotal += $cart->subtotal;
            }   
        }

        $trans = new Transaction();
        $trans->user_id = $userId;
        $trans->total = $grandTotal;
        $trans->save();
        
        $transaction = Transaction::where('user_id', 'like', "$userId")
                ->orderBy('id', 'desc')
                ->first();

        foreach($carts as $cart)
        {
            DB::table('item_transaction')->insert([
                ['transaction_id' => $transaction->id, 'item_id' => $cart->item_id, 'quantity' => $cart->quantity, 'subtotal' => $cart->subtotal]     
            ]);

            $min = $cart->item->stock - $cart->quantity;

            DB::table('items')->where(['id' => $cart->item_id])->update([
                'stock' => $min     
            ]);

            DB::table('carts')->where(['user_id' => $userId, 'item_id' => $cart->item_id])
            ->delete();    
        }

        return redirect()->action([viewController::class, 'mainview']);
    }

    public function history()
    {
        $userId = Auth::user()->id;

        $transaction = Transaction::where('user_id', 'like', "$userId")
            ->orderBy('created_at', 'desc')
            ->get();

        if($transaction->isEmpty())
        {
            $transaction = null;
        }
        
        return view('transactionHistory', ['transaction' => $transaction]);

    }

}
