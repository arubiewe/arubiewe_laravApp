@extends('layouts.student_master')
@section('content')
<style>
  table, th, td {
    border: 1px solid grey;
    
  
  }
  table {
    
    border-spacing: 0px;
     
  }

  table {
  width: 100%;
}
  
  </style>
<div class="container alert-primary" align="center" >
   
   
<hr/> 

<h3> <center> ADENIRAN OGUNSANYA COLLEGE OF EDUCATION </center></h3> <h4><center> KM 30, BADAGRY EXPRESSWAY, OTO/IJANIKIN LAGOS. </center></h4>    
    <center>
       @foreach($session as $sesn)
      <h5> COURSE REGISTRATION FORM - {{ $sesn->session }} Academic Session </h5>
      <marquee class="alert-danger"><b>Note:</b> Please ensure you print the course registration form</marquee>
   @endforeach
 </center>
</div>


  <h5><center>PERSONAL INFORMATION</center></h5>
  <div class="container-fluid">

  <table border="1px"> 


  
  <tr>
    <td>
      <p><b>MATRIC NO :</b> {{Auth::guard('students')->user()->matric_no }} </p>
    </td>
  </tr>

  <tr>
    <td >
      <p><b>SURNAME :</b>{{Auth::guard('students')->user()->surname }} </p>
    </td>
  </tr>

  <tr>
    <td >
      <p><b>OTHER NAMES :</b> {{Auth::guard('students')->user()->other_names }}  </p>
    </td>
  </tr>

  <tr>
    <td>
      <p><b>COMBINATION :</b> {{Auth::guard('students')->user()->combination }} </p>
    </td>

    <td>
      <p><b>&nbsp; &nbsp;  &nbsp; COMBINATION :</b> </p>
    </td>
  </tr>



</table>
  </div>


<br>
<div class="container alert-primary">
<form action="" method="">
<table class="table .table-bordered ">
                    
    <thead>
      <tr>
    {{-- <td>Id</td> --}}
    {{-- <th>Course Id</th> --}}
   
    <th>Course Code</th>
    <th>Course Title</th>
    <th>Unit</td>
    <th>Status</td>

    <th>Semester</td>
  
    </tr>
    </thead>


    {{-- @foreach(array_merge($courses) as $course) --}}
   

@foreach ($registration as $reg)


<tbody>
    

<tr>

{{-- <td><input type="checkbox" name="course[]" value="{{$course['id']}} {{$course['course_code']}}"></td> --}}

{{-- <th scope="row">1</th> --}} {{-- <td>{{ $course-> id }}</td> --}}
{{-- <td>{{ $course-> course_id }}</td> --}}
<td> {{ $reg->course->course_code }}</td>
<td> {{ $reg->course->course_title }}</td>
<td> Unit</td>
<td> Status</td>
<td> {{ $reg->course->semester }}</td>
{{-- <td>{{ $reg['course_title'] }}</td>
<td>{{ $reg['semester'] }}</td> --}}

</tr>
@endforeach



</tbody>


</table>
<h4> HOD Signature</h4>
______________________

<button class="btn btn-primary" onclick="window.print()">PRINT</button>
</form>






@endsection











