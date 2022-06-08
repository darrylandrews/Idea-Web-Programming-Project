<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Homepage</title>
  </head>
  <body>
    <div class="container-fluid" style="background-color: #003366;">

        <div class="row">
            <div class="col col-md-2">
                <div class="jumbotron jumbotron-fluid" style="background-color: #003366;">
                    <div class="container text-center" style="height: 100px; margin-top: -20px; margin-bottom: -50px; background-color: #ffc40a; width: 200px;">
                        <h1 class="display-3 font-weight-bold">IDEA</h1>
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

        <div class="row" style="background-color: #F5F5DC;">
            <div class="col col-md-12 text-center mt-4 mb-4">
                <h1 class="font-weight-bold">View our newest Catalogue!</h1>
            </div>
        </div>
        <div class="row mt">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin:auto; width:100%">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="catalogue1.jpeg" alt="First slide" style="height: 600px;">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="catalogue2.jpeg" alt="Second slide" style="height: 600px;">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="catalogue3.jpeg" alt="Third slide" style="height: 600px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
            <div class="col col-md-12 text-center mt-3 mb-2 text-light">
                <h2 class="font-weight-bold">Furnitures</h2>
            </div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
            
            <div class="row" style="margin: auto; width: 100%">
                @foreach($types as $type)
                    
                    <div class="col col-md-3 mb-3 mt-3">
                        <div class="card" style="width: 17rem; border-radius: 17px;">
                            <img class="card-img-top" src="{{ asset($type->image) }}" alt="Card image cap" style="border-radius: 15px 15px 0px;">
                            <div class="card-body text-center" style="background-color: #e0e0e0; border-radius: 0px 0px 15px 15px;">
                                <a href="{{ url('item', $type->id) }}" class="card-title font-weight-bold" style="font-size: 28px">{{ $type->type }}</a></br></br>
                                
                                @if(!Illuminate\Support\Facades\Auth::check())
                                @else
                                    @if(Illuminate\Support\Facades\Auth::user()->role_id == '1')
                                        <a href="{{ url('updateT', $type->id) }}" class="btn btn-secondary">Update</a>
                                        <a href="{{ url('deleteT', $type->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{ $type->type }}? ')">Delete</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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