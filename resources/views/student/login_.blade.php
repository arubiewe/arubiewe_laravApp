{{-- @extends('layouts.student_master')
@section('content') --}}

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> AOCOED - Student|Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset ('css/style.css') }}" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Student Login Area! Ooops </h4></a>
                                <br />

                               {{-- @if(isset(Auth::student->matric_no))
                               <script>window.location = "/student/dashboard";    </script>
                               @endif --}}


                                @if ($message = Session::get('error'))


                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>  {{ $message }}  </strong>
                                
                                </div>
                                @endif 

                                @if (count($errors) > 0 )
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach($errors->all() as $error )

                                        <li> {{ $error }} </li>

                                        @endforeach


                                    </div>
                                    @endif

                                <form method="POST" action="{{ url('student/dashboard')}}" class="mt-5 mb-5 login-input">
                                    @csrf
                                    {{-- {{csrf_field()}} --}}
                                    <div class="form-group">
                                        <input type="text" name="matricno" class="form-control" placeholder="Matric No" value="{{old('name')}}" >
                                    {{-- <span class="text-danger"> @error('name'){{$message}}@enderror </span>--}}
                                    
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="" >
                                        {{-- <span class="text-danger"> @error('password'){{$message}}@enderror </span> --}}
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="pin" class="form-control" placeholder="Enter User Access Code" value="" >
                                        {{-- <span class="text-danger"> @error('password'){{$message}}@enderror </span> --}}
                                    </div>
                                    <input type="submit" name="login" class="btn login-form__btn submit w-100" value="Login"  />
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>

{{-- @endsection --}}



