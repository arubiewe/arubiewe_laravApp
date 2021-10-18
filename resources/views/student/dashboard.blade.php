@extends('layouts.student_master')
@section('content')


<div class="container-fluid">
<h5> Welcome to Your Dashboard Area!</h5>

</div>
@if(isset(Auth::guard('students')->name))
{{-- <script>window.location = "/student/dashboard";    </script> --}}
    <div class="alert alert-danger alert-block">
    
        <strong> Welcome {{Auth::guard('students')->name}}  </strong>

    </div>
    <a href="{{ url ('/student/logout') }}"> Logout </a>
else

<script>window.location = "/student";    </script> 

@endif

<br/>








@endsection


