<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product Details</title>
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
                            <a class="dropdown-item text-light" href="/transactionH">Transaction History</a>
                            <a class="dropdown-item text-light" href="/logout">Log Out</a>
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <div class="row" style="background-color: #1b1a19;">

            <div class="col col-md-2"></div>

            <div class="col col-md-8 mt-4 text-center" style="height: 70px">
                <h2 class="text-light font-weight-bold" style="font-size: 50px">Product Details</h2>
            </div>

            <div class="col col-md-2"></div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
            <div class="col col-md-1"></div>  

            <div class="col col-md-10">
                <hr class="bg-light" style="width:100%">   
            </div>

            <div class="col col-md-1"></div>
        </div>
        
        <div class="row" style="background-color: #1b1a19;">
            <div class="col col-md-12 text-center mt-3 mb-2 text-light">
                <h2 class="font-weight-bold"></h2>
            </div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
    
            <div class="col col-md-6 " style="margin: auto;">
                <div class="card mb-3 mt-2 mb-5 border-light" style="max-width: 540px; margin: auto;">
                    <div class="row no-gutters" >
                        <div class="col-md-6 bg-light">
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="photo" style="width: 269px; height: 330px; margin: auto;">
                        </div>
                        <div class="col-md-6" style="background-color: #e0e0e0;">
                            <div class="card-body">
                                <div style="height: 40px;">
                                    <a class="card-title font-weight-bold" style="font-size:22px">{{ $item->name }}</a>
                                </div>

                                <hr class="bg-secondary">
                                
                                <div class="mr-2 mb-2" style="height: 30px; font-size: 13px">
                                    <p>{{ $item->description }}</p>
                                </div>

                                <div style="font-size: 22px">
                                    <p>Rp. {{ $item->price }}</p>
                                </div>

                                <div style="font-size: 16px">
                                    <p>Stock: {{ $item->stock }}</p>
                                </div>  

                                @if(!Illuminate\Support\Facades\Auth::check())
                                @else
                                    @if(Illuminate\Support\Facades\Auth::user()->role_id == '1')
                                    @else
                                    <form method = "POST" action = "{{ url('detailsP/'.$item->id) }}" enctype="multipart/form-data" style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" >
                    
                                     {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-4" style="background-color: #e0e0e0;">
                                            <label for="stock" style="font-size: 14px">Quantity:</label>
                                        </div>
                                        <div class="col-md-2" style="background-color: #e0e0e0;">
                                        @if($item->stock == 0)
                                            <input type="text" name="Purchase" id="Purchase" placeholder="2 late dude" style="width:1500%" value="" disabled>        
                                        @else
                                            <input type="text" name="Purchase" id="Purchase" placeholder="Enter Quantity" style="width:1500%" value="">        
                                        @endif
                                        </div>
                                    </div>

                                    <div class="text-center mt-2">
                                        @if($item->stock == 0)
                                            <button type="submit" value="submit" class="btn btn-secondary text-center" style="width: 100%" disabled>Sold Out!</button>
                                        @else
                                            <button type="submit" value="submit" class="btn btn-primary text-center" style="width: 100%">Add to Cart</button>
                                        @endif
                                    </div>
                                   
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                                
                                            </div>
                                        @endif
                                    </form>
                                    @endif
                                @endif           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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