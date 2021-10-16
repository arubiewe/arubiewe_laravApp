@extends('layouts.admin_master')

@section('content')
    

{{-- <!DOCTYPE html>
<html>
    <head> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Create Course</title>
    {{-- </head> --}}
            <body>
                {{-- <div class="jumbotron alert-primary">
                <h3> <center> COURSE REGISTRATION </center></h3>          
                </div>
<div class="container-fluid"> --}}
    <div class="container-fluid">
      <form method="POST" action="/admin_dashboard/course_reg" >
        @csrf
      
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCourseCode">Course Code</label>
      <input type="text" class="form-control" id="coursecode" name="coursecode">
    </div>

    <div class="form-group col-md-4">
        <label for="inputCourseTitle">Course Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>


    <div class="form-group col-md-2">
      <label for="inputUnit">Unit</label>
      <select id="unit" name="unit" class="form-control">
        <option selected>Choose...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>


    <div class="form-group col-md-2">
        <label for="inputStatus">Status</label>
        <select id="status" name="status" class="form-control">
          <option selected>Choose...</option>
          <option value="C">C</option>
          <option value="E">E</option>
          
        </select>
      </div>


      <div class="form-group col-md-2">
        <label for="inputSemester">Semester</label>
        <select id="semester" name="semester" class="form-control">
          <option selected>Choose...</option>
          <option value="First">First</option>
          <option value="Second">Second</option>
          
        </select>
      </div>


</div>

<button type="submit" value="sumbit" class="btn btn-primary">Save</button>
 
      </form>
</div>
</div>
  
</div>

@endsection




{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> --}}
    {{-- </body>
</html> --}}
