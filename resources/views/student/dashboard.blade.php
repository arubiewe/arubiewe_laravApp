@extends('layouts.student_master')
@section('content')


@if(isset(Auth::student()->matric_no))
{{-- <script>window.location = "/student/dashboard";    </script> --}}
    <div class="alert alert-danger alert-block">
    
        <strong> Welcome {{Auth::student()-> $matric_no }}  </strong>

    </div>
    <a href="{{ url ('/student/logout') }}"> Logout </a>
else

<script>window.location = "/student";    </script> 

@endif

<br/>








@endsection


