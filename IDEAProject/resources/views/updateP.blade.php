<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Product</title>
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
            
            <div class="col col-md-8"></div>

            <div class="col col-md-2 text-center" style="margin:auto; height: 50px;">
                <a type="button" class="btn text-left text-light" href="{{ url('') }}" style="width: 100%; height: 100%; font-size: 25px; background-color:#1b1a19">
                    Cancel
                </a>
            </div>
        </div>

        <div class="row" style="background-color: #1b1a19;">
            <div class="col col-md-4 mb-3"></div>

            <div class="col col-md-4 mb-5 mt-5" style="border-radius: 10px; background-color: #F5F5DC;">
                <h2 class="text-center mt-4">Edit Product</h2>

                <form method = "POST" action = "" enctype="multipart/form-data" style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" >
                    
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="Name" class="form-control" id="name" placeholder="Enter name" value="{{ $items->name }}">
                    </div>

                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Image</label>
                        <input type="file" name="Image" class="form-control" id="image">
                    </div>
                    
                    <div class="form-group">
                        <div class="col">
                            <label for="inlineFormCustomSelect" class="font-weight-bold">Product Type</label>
                            <select name="TypeId" class="custom-select">
                                @foreach($types as $type)
                                    @if($type->id == $items->type_id)
                                        <option value="{{ $type->id }}" selected>{{$type->type}}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{$type->type}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stock" class="font-weight-bold">Stock</label>
                        <input type="text" name="Stock" class="form-control" id="stock" placeholder="Enter Stock" value="{{ $items->stock }}">
                    </div>

                    <div class="form-group">
                        <label for="price" class="font-weight-bold">Price</label>
                        <input type="text" name="Price" class="form-control" id="price" placeholder="Enter Price" value="{{ $items->price }}">
                    </div>

                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Description</label>
                        <input type="text" name="Description" class="form-control" id="description" placeholder="Enter Description" value="{{ $items->description }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" value="submit" class="btn btn-primary text-center">Submit</button>
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

            <div class="col col-md-4 mb-3"></div>
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