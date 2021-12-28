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
                <h3> <center> COURSES UPLOAD ARENA! </center></h3>          
                </div>
<div class="container-fluid"> --}}







    <div class="container-fluid">






<form method="POST" action="/admin_dashboard/course_reg" >
        @csrf


      
    <div class="form-row">

   
    <div class="col-md-12">

        <table class="table" id="multiForm">
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Course Unit</th>
                    <th>Course Status</th>
                    <th>Course Semester</th>
                    <th>IsGeneral</th>
                    <th>Action</th>
                </tr>

<tr>
        

    <div class="col-md-4">

      <!-- <label for="inputCourseCode">Course Code</label> -->
      <td class="">
      
      <input type="text" class="form-control" id="coursecode" name="multiInput[0][coursecode]">
    </td>

    </div>

    </div>

    <div class="col-md-10">
        <td class="">
        <!-- <label for="inputCourseTitle">Course Title</label> -->
        <input type="text" class="form-control" size="195" id="title" name="multiInput[0][title]">
      </td>
      </div>


    <div class="form-group col-md-8">

        <td>
      <!-- <label for="inputUnit">Unit</label> -->
      <select id="unit" name="multiInput[0][unit]" class="form-control">
        <option selected>Choose...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
  </td>
    </div>


    <div class="form-group col-md-8">
    <td>
        <!-- <label for="inputStatus">Status</label> -->
        <select id="status" name="multiInput[0][status]" class="form-control">
          <option selected>Choose...</option>
          <option value="C">C</option>
          <option value="E">E</option>
          
        </select>

    </td>
      </div>



      <div class="form-group col-md-8">
    <td>
        <!-- <label for="inputSemester">Semester</label> -->
        <select id="semester" name="multiInput[0][semester]" class="form-control">
          <option selected>Choose...</option>
          <option value="First">First</option>
          <option value="Second">Second</option>
          
        </select>
    </td>
      </div>

     
      <div class="form-group col-md-8">
     <td>
       <!--  <label for="inputSemester">Is General</label> -->

        <select id="general" name="multiInput[0][isgeneral]" class="form-control">
          <option selected>Choose...</option>
          <option value="0">No</option>
          <option value="1">Yes</option>
         
        </select>
    </td>
      </div>
 
     <td>
        <input type="button" name="add" value="Add" id="addRemoveIp" class="btn btn-outline-primary">
    </td>

        </tr>
</table>

        <button type="submit" value="sumbit" class="btn btn-success">Save</button>
 
</form>
</div>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var i = 0;
    $("#addRemoveIp").click(function () {
        ++i;
        $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][coursecode]" class="form-control" <tr><td><input type="text" name="multiInput['+i+'][title]" class="form-control" <tr><td><select name = multiInput['+i+'][unit] " class="form-control" /> </select></td></td></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr> ' );

    });
    $(document).on('click', '.remove-item', function () {
        $(this).parents('tr').remove();
    });

</script>


@endsection




{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> --}}
    {{-- </body>
</html> --}}
