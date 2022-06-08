<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Shopping Cart</title>
  </head>
  <body>
    <div class="container-fluid" style="background-color: #003366;">

        <div class="row">
            <div class="col col-md-2">
                <div class="jumbotron jumbotron-fluid" style="background-color: #003366;">
                    <div class="container text-center" style="height: 100px; margin-top: -20px; margin-bottom: -50px; background-color: #ffc40a; width: 200px;">
                        <a class="display-3 font-weight-bold text-dark" href="/" style="text-decoration: none;">IDEA</a>
                    </div>
                </div>
            </div>

            @if(!Illuminate\Support\Facades\Auth::check())
                <div class="col col-md-8"></div>

                <div class="col col-md-2 text-center" style="margin:auto; height: 50px;">

                    <div class="row">
                        <a type="button" class="btn text-center text-light mr-1" href="{{ url('login') }}" style="width: 46%; height: 100%; font-size: 22px; background-color:#1b1a19">
                            Login
                        </a>
                        <a type="button" class="btn text-center text-light mr-1" href="{{ url('register') }}" style="width: 50%; height: 100%; font-size: 22px; background-color:#1b1a19">
                            Register
                        </a>
                    </div>
                </div>
            @else
                @if(Illuminate\Support\Facades\Auth::user()->role_id == '1')
                    <div class="col col-md-6"></div>

                    <div class="col col-md-4 text-center" style="margin:auto; height: 50px;">
                        <div class="btn-group" style="width: 100%; height: 100%;">
                            <a type="button" class="btn text-center text-light mr-1" href="{{ url('addP') }}" style="width: 46%; height: 100%; font-size: 22px; background-color:#1b1a19">
                                Products
                            </a>
                            <a type="button" class="btn text-center text-light mr-1" href="{{ url('addT') }}" style="width: 46%; height: 100%; font-size: 22px; background-color:#1b1a19">
                                Product Types
                            </a>
                
                            <button type="button" class="btn dropdown-toggle text-left text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; font-size: 25px; background-color:#1b1a19">  
                                Admin
                            </button>
                            <div class="dropdown-menu dropwdown-menu-left bg-dark">
                                <h4 class="dropdown-header">{{ Illuminate\Support\Facades\Auth::user()->name }}</h4>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-light" href="/logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col col-md-8"></div>

                    <div class="col col-md-2 text-center" style="margin:auto; height: 50px;">
                        <button type="button" class="btn dropdown-toggle text-left text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; font-size: 25px; background-color:#1b1a19">  
                            User
                        </button>

                        <div class="dropdown-menu dropwdown-menu-left bg-dark">
                            <h4 class="dropdown-header">{{ Illuminate\Support\Facades\Auth::user()->name }}</h4>
                            <div class="dropdown-divider"></div>    
                            <a class="dropdown-item text-light" href="/updateM">Edit Profile</a>                    
                            <a class="dropdown-item text-light" href="/transactionH">Transaction History</a>
                            <a class="dropdown-item text-light" href="/logout">Log Out</a>
                        </div>
                    </div>
                @endif
            @endif

        </div>

        <div class="row bg-light">
            <h2 class="mt-3" style="margin: auto"> Shopping Cart</h2>
        </div>

        
            
            @if($carts == null)
                <div class="row bg-light">
                    <div style="width: 100%; height: 500px">
                        <h2 class="text-center" style="margin-top: 200px;">You don't have any items in your shopping cart. UwU</h2>

                        <div class="row mt">
                            <a type="button" class="btn text-center text-light bg-primary mt-2" href="{{ url('/') }}" style="margin:auto;">
                                Buy some stuff for meow!
                            </a>
                        </div>
                    </div>
                </div>
            @else
                @foreach($carts as $cart) 
                
                    @if($cart->item->stock == 0) 
                        <meta http-equiv = "refresh" content = "0; {{ url('cartD', $cart->item_id) }}">
                    @else
                        <div class="row bg-light">
                            <hr style="width:95%; height: 2px; background-color:#ffc40a">
                            <div class="col col-md-2" style="margin: auto">
                                <img class="card-img-top" src="{{ asset($cart->item->image) }}" alt="Card image cap" style="border-radius: 15px 15px 0px;">
                            </div>

                            <div class="col col-md-2" style="margin: auto">
                                {{ $cart->item->name }}
                            </div>

                            <div class="col col-md-3" style="margin: auto">
                                <form method = "POST" action = "{{ url('cart/'.$cart->item_id) }}" enctype="multipart/form-data" style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" >
                                
                                {{ csrf_field() }}
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="stock" style="font-size: 18px">Quantity:</label>
                                    </div>

                                    <div class="col-md-3">
                                        @if($cart->quantity > $cart->item->stock)
                                            <input type="text" name="quantity" id="quantity" class="border border-danger" style="width: 50px" value="{{ $cart->quantity }}">        
                                            
                                        @else
                                            <input type="text" name="quantity" id="quantity" class="border" style="width: 50px" value="{{ $cart->quantity }}">        
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="stock" style="font-size: 18px">of {{ $cart->item->stock }}</label>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <button type="submit" value="submit" class="btn btn-primary text-center" style="height: 32px; padding-bottom: 30px">&#10003;</button>
                                    </div>
                                </div>   

                                @if($cart->quantity > $cart->item->stock)  
                                    <div class="alert alert-danger">                                   
                                        Sorry! the product stock has been updated.
                                    </div>  
                                @endif                       
                                </form>
                            </div>

                            <div class="col col-md-2" style="margin: auto">
                                {{ $cart->price }}
                            </div>

                            <div class="col col-md-2" style="margin: auto">
                                {{ $cart->subtotal }}
                            </div>

                            <div class="col col-md-1" style="margin: auto">
                                <a href="{{ url('cartD', $cart->item_id) }}" class="btn btn-primary text-center" style="height: 32px; padding-bottom: 30px">X</a>
                            </div>
                            
                        </div>
                    @endif
                @endforeach

            @endif
        </div>
            
        @if($carts == null)
        @else
            <div class="row bg-light">
                <hr style="width:95%; height: 2px; background-color:#003366;">
                <div class="col col-md-3 mt-3 text-center">
                    <h5>Grand Total: Rp.{{ $grandtotal }}</h5>
                </div>

                <div class="col col-md-7 mt-3">
                    @if (count($errors) > 0 ) 
                        <div class="alert alert-danger">                                   
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach                                 
                        </div>
                    @endif 
                </div>

                <div class="col col-md-2 mt-2 mb-3 text-center">
                    <a href="{{ url('transaction') }}" class="btn btn-primary text-center font-weight-bold" style="height: 32px; padding-bottom: 30px">Checkout</a>
                </div>
            </div>
        @endif
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
    <footer class="text-center text-dark" style="background-color: #1b1a19; min-height: 15vh;">
        <br><br>
        <h6 class="text-light">Copyright &#169; 2020 IDEA.Inc. All rights reserved.</h6>
        <h6 class="text-light">Don't steal! Darryl and Felix's Project</h6>
    </footer>
</html>