<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>History</title>
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
                            <a class="dropdown-item text-light" href="/cart">Shopping Cart</a>
                            <a class="dropdown-item text-light" href="/logout">Log Out</a>
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <div class="row bg-light">
            <h1 class="mt-3 ml-4 mb-3">Transaction History</h1>
        </div>
            @if($transaction == null)
                <div class="row bg-light">
                    <div style="width: 100%; height: 500px">
                        <h2 class="text-center" style="margin-top: 200px;">You didn't buy anything?! OwO</h2>

                        <div class="row mt">
                            <a type="button" class="btn text-center text-light bg-primary mt-2" href="{{ url('/') }}" style="margin:auto;">
                                Buy some stuff for meow!
                            </a>
                        </div>
                    </div>
                </div>
            @else
                @foreach($transaction as $trans)
                    <div class="row bg-light">
                        <div class="col md-8 ml-5 mt-3">
                            <h4>{{ $trans->created_at }}</h4>
                        </div>

                        <div class="col md-4">
                        </div>
                        <hr style="width:90%; height: 2px; background-color:#ffc40a"> 
                    </div>
                
                    @foreach($trans->itemtransaction as $it)
                    <div class="row bg-light">
                        <div class="col col-md-1"></div>  

                        <div class="col col-md-2 mt-3">
                            <img class="card-img-top" src="{{ asset($it->item->image) }}" alt="Card image cap" style="left:0">
                        </div>

                        <div class="col col-md-2 mt-3 text-center">
                            <label for="name" style="font-size: 18px">Product Name:</label><br>
                            <label for="name" style="font-size: 18px">{{ $it->item->name }}</label>
                        </div>

                        <div class="col col-md-2 mt-3 text-center">
                            <label for="qty" style="font-size: 18px">Quantity:</label><br>
                            <label for="qty" style="font-size: 18px">{{ $it->quantity }}</label>
                        </div>

                        <div class="col col-md-2 mt-3 text-center">
                            <label for="price" style="font-size: 18px">Price:</label><br>
                            <label for="price" style="font-size: 18px">{{ $it->item->price }}</label>
                        </div>

                        <div class="col col-md-2 mt-3 text-right">
                            <label for="subtotal" style="font-size: 18px">Subtotal:</label><br>
                            <label for="subtotal" style="font-size: 18px">{{ $it->subtotal }}</label>
                        </div>

                        <div class="col col-md-1"></div>  
                    </div>
                    @endforeach
                    <div class="row bg-light ">
                        <div class="col md-9">
                        </div>


                        <div class="col md-2 text-right">
                            <hr style="margin-right:0px; width:50%; height:3px; background-color:#003366;"> 
                            <h4 class="mb-4">Grand Total: {{ $trans->total }}</h4>
                        </div>

                        <div class="col col-md-1">
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
    <footer class="text-center text-dark" style="background-color: #1b1a19; min-height: 16vh;">
        <br><br>
        <h6 class="text-light">Copyright &#169; 2020 IDEA.Inc. All rights reserved.</h6>
        <h6 class="text-light">Don't steal! Darryl and Felix's Project</h6>
    </footer>
</html>