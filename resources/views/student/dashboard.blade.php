@extends('layouts.student_master')
@section('content')


<div class="container-fluid">
<h5> Welcome to Your Dashboard Area!</h5>

@if ($message =  Session::get('message2'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{ $message }} </strong>
</div> 

   
@endif

{{--{{ dd(Auth::guard('students')->student()->id;)}}--}}



</div>





{{-- @if(isset(Auth::guard('students')))  --}}


{{-- @if(isset(Auth::student())) --}}
 {{-- <script>window.location = "/student/dashboard";    </script> --}}
  <div class="jumbotron alert-success" align="center">
    
        <h3>Welcome Back ! {{Auth::guard('students')->user()->surname }}  ({{Auth::guard('students')->user()->matric_no }} )</h3>
        <h4> DEPT:  {{Auth::guard('students')->user()->combination }}</h4>
          
          @foreach($dashbaordSession as $dsession)
          <h5 style="color:blue"> {{ $dsession->session }} Academic Session</h5>
          
            {{-- $session = StudentSession::where('id', 1)->value('session');  --}}
        {{-- $uss = Auth('students')->user()->matric_no; --}}
        @endforeach

        @foreach($vendors as $ven)
       
        
      
         @endforeach
        
      {{-- <p>  {{ $vendors->get("vendors") }} </p> --}}
    {{-- {{ $vendors->vendor_name }} --}}
    </div>
  


{{-- <script>window.location = "/student";    </script>  --}}

{{-- @endif --}}

  </div>

  <a href="{{ url ('/student/logout') }}"> Logout </a>






@endsection


