@extends('layouts.student_master')
@section('content')

<div class="container alert-primary" align="center" >
    <h2>Student Course Form</h2>
   
    @foreach($session as $sesn)
   <h5> {{ $sesn->session }} Academic Session</h5>
   <marquee class="alert-danger"><b>Note:</b> Please ensure you print the course registration form</marquee>
@endforeach
</div>
<hr/> 


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











