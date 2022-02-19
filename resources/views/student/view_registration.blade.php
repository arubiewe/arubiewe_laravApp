@extends('layouts.student_master')
@section('content')



<table class="table table-hover">
    
    <tr>
      
      <th scope="col">Matric Number</th>
      <th scope="col">Session</th>
      <th scope="col">Semester</th>
      <th scope="col">Action</th>
    </tr>
 

    @foreach ($reghistory as $history)
    <tr>
      
      <td> {{ $history->matric_no }} </td>
      <td>{{ $history->session }}</td>
      <td>{{ $history->semester }}</td>
      <td><li> <a href="" class="btn btn alert-danger"> View <li></td>
      
    </tr>
    
    @endforeach 
</table>







@endsection











