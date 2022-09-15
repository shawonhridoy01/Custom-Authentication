<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card mt-5">

                @if (Session::has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{Session::get('fail')}}</strong>
                </div>

                @endif


            

                    <div class="card-header">
                        <h2>Registration Form</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{route('registration.registration')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Enter Your First Name </label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your First Name " aria-describedby="helpId" value="{{old('first_name')}}">

                                @error('first_name')
                                <small id="helpId" class=" text-danger">    {{ $message }}</small>
                                @enderror



                            </div>


                            <div class="form-group">
                                <label for="">Enter Your Last Name </label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Your Last Name " aria-describedby="helpId" value="{{old('last_name')}}">
                                @error('last_name')
                                <small id="helpId" class=" text-danger">    {{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="">Enter Your Email </label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email Name " aria-describedby="helpId" value="{{old('email')}}">
                                @error('email')
                                <small id="helpId" class=" text-danger">    {{ $message }}</small>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="">Enter Your Password </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password " aria-describedby="helpId" value="{{old('password')}}">
                                @error('password')
                                <small id="helpId" class=" text-danger">    {{ $message }}</small>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">REGISTRATION</button>

                            <a href="/login"  > Already Registered<i class="fa fa-registered" aria-hidden="true" ></i> </a>

                        </form>
                    </div>


                </div>


            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
