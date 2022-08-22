<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Change Information </title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Change Information </h2>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form action="{{route('save-information')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label for="id" class="form-label"> ID </label>
                        <input type="text" name="username" class="form-control"
                            value="{{$data -> CustomerID}}" readonly>
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" name="fullname" class="form-control"
                        value="{{$data -> CustomerFullname}}">
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" name="address" class="form-control"
                        value="{{$data -> CustomerAddress}}">
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" name="email" class="form-control"
                        value="{{$data -> CustomerEmail}}">
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label"> Name </label>
                        <input type="text" name="phone" class="form-control"
                        value="{{$data -> CustomerPhone}}">
                    </div>
                    

                    <button type="submit" class="btn btn-primary"> Submit </button>
                    <a href="{{url('products')}}" class="btn btn-danger"> Back </a>
                </form>
            </div>
        </div>
  </body>
</html>