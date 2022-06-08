<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Edit Profile</title>
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
            
            <div class="col col-md-10"></div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
            <div class="col col-md-4 mb-5"></div>

            <div class="col col-md-4 mb-5 mt-5" style="border-radius: 10px; background-color: #F5F5DC;">
                <h2 class="text-center mt-4">Edit Profile</h2>

                <form style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" action="updateM" method="POST" class="needs-validation">
                    
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="Name" class="form-control" id="name" placeholder="Enter name" value="{{Illuminate\Support\Facades\Auth::user()->name}}"> 
                    </div>

                    <div class="form-group">
                        <label for="dob" class="font-weight-bold">Date of Birth</label>
                        <input class="form-control" placeholder="dd-mm-yyyy" value="" type="date" name="Birthday" id="dob">
                    </div>

                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Address</label>
                        <textarea name="Address" class="form-control" id="address" placeholder="Enter address" value="{{Illuminate\Support\Facades\Auth::user()->address}}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="font-weight-bold">Gender</label>
                        
                        <div class="form-check">
                        @if(Illuminate\Support\Facades\Auth::user()->gender == 'Male')
                            <input class="form-check-input" type="radio" name="Gender" id="male" value="Male" checked>
                        @else
                            <input class="form-check-input" type="radio" name="Gender" id="male" value="Male">
                        @endif 
                            <label class="form-check-label" for="male">                            
                                Male                               
                            </label>                       
                        </div>
                        <div class="form-check">
                        @if(Illuminate\Support\Facades\Auth::user()->gender == 'Female')
                            <input class="form-check-input" type="radio" name="Gender" id="male" value="Female" checked>
                        @else
                            <input class="form-check-input" type="radio" name="Gender" id="female" value="Female">
                        @endif
                            <label class="form-check-label" for="female">
                                Female                       
                            </label>                      
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" value="" class="btn btn-primary text-center">Submit</button>
                    </div>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>
            </div>

            <div class="col col-md-4 mb-5"></div>
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