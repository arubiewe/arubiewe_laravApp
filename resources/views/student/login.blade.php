{{-- @extends('layouts.student_master')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="csrf-token" content="ss30QKNE0BLAmqulbrdh4MFsNEUu4Rk9B0TeSaQp"> -->
        <title>AOCOED | Student Login</title>
        
        
        {{-- <link rel="icon" href="https://cointario.com/online/storage/app/public/photos/jba6gyfaviconin.png1640563511" type="image/png"/> --}}
                   
            <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
            <!-- Icons -->
            <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
        
            <link rel="stylesheet" href="{{ asset('css/line.css') }}">
            
            <!-- Main Css -->
            <link href="{{ asset ('css/styles.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/colors/default.css') }}" rel="stylesheet">
        

    </head>
    <body class="h-100 bg-soft-primary">
       <section class="auth">
	   
        <div class="container">
		
            <div class="pb-4 row justify-content-center">

                <div class="img-responsive center-block">
                    <a href="/"><img src="{{asset ('images/logo.png') }}" alt="" width="100px" height="90px" class="img-responsive mx-auto d-block"></a>
                    <h2><center>AOCOED STUDENT PORTAL</center></h2>
                     <div class="bg-white shadow card login-page roundedd border-1 ">
                        <div class="card-body">
                            <h4 class="text-center card-title">Student Login</h4>
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

                            <form method="POST" action="{{ url('student/dashboard')}}"  class="mt-4 login-form">
                                @csrf
                                 {{-- <input type="hidden" name="_token" value="ss30QKNE0BLAmqulbrdh4MFsNEUu4Rk9B0TeSaQp">                                <div class="row"> --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Matric No <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="pl-5 form-control" name ="matricno" value="{{old('name')}}" id="matricno" placeholder="AOC/20/ or 00/00000" style='text-transform:uppercase' maxlength="19" required />
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Password <span class="text-danger">* </span></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" name="password" id="password"  placeholder="Enter your Password" required>
												<!-- <small class="mr-2 text-dark">Always your surname -->
                                                <!-- </small> -->
                                            
											</div>
                                        </div>
                                    </div>
									
									<div class="col-lg-12">
                                        <div class="form-group">
                                            <!-- <label>Authorized Pin <span class="text-danger">*</span></label> -->
                                            <div class="position-relative">
                                                <i data-feather="pad-lock" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" width="1px;" name="pin" id="pin" placeholder="Enter Your Accredited PIN" required>
                                            </div>
                                        </div>
                                    </div>
									 
                                    <!--end col-->

                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-primary btn-block pad" type="submit" name="login">Sign in</button>
                                    </div>
                                    <!--end col-->

                                    <div class="text-center col-12">
                                        <p class="mt-4 mb-0"><small class="mr-2 text-dark">&copy; Copyright  2022 &nbsp; Arubiewe ICT &nbsp; All Rights Reserved.</small>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                    <!---->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->




                 <script src="https://cointario.com/online/temp/js/jquery-3.5.1.min.js"></script>
            <script src="https://cointario.com/online/temp/js/bootstrap.bundle.min.js"></script>
            
            <!-- SLIDER -->
            <script src="https://cointario.com/online/temp/js/owl.carousel.min.js"></script>
            <script src="https://cointario.com/online/temp/js/owl.init.js"></script>
            <!-- Icons -->
            <script src="https://cointario.com/online/temp/js/feather.min.js"></script>
            <script src="https://cointario.com/online/temp/js/bundle.js"></script>
            
            
       

    </body>
</html>
