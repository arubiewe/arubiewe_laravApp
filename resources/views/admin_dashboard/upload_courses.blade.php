@extends('layouts.admin_master')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">


<title>Course Upload </title>

<div class="container-fluid">
    
    <div class="jumbotron alert alert-grey">
        <h5>Batch Upload </h5>
        <form method="POST" action="/admin_dashboard/upload_courses" enctype="multipart/form-data" >
            @csrf
            <select id="optiondept" name="optiondept" class="form-control col-md-8 dynamic" data-live-search="true" required >
                <option value="">Choose Department</option>
                @foreach ($department as $optiondept)
                
                    <option value="{{ $optiondept->id }}">{{ $optiondept->name }}</option>
                
                @endforeach
            </select>
            <br>
            <div class="row">
                <div class="col col-md-12">
                    <p><input type="file" id="exampleInputFile" name="excel_file" class="form-control col-md-3" required > <br> </p>
                    
                </div>
                
            </div>
            <button type="submit" value="sumbit" class="btn btn-danger">Upload</button>
            @error('excel_file')
                <p class="text-danger">{{$message}}</p>
            @enderror 
        </form>
    </div>
    
</div>
<hr>

<form method="POST" action="/admin_dashboard/upload_courses" >
    @csrf
    <h5> Select Department </h5>
    <select id="optiondept" name="optiondept" class="form-control col-md-8 dynamic" data-live-search="true" required >
        <option value="">Choose...</option>
        @foreach ($department as $optiondept)
        
        <option value="{{ $optiondept->id }}">{{ $optiondept->name }}</option>
        
        @endforeach
    </select>
    {{-- <select id="unitq" name="dptq" class="form-control col-md-8" required >
        <option value="">Choose...</option>
        <option value="C">Department</option>
        <option value="E">Cpomputer</option>
    </select> --}}
    
    
    {{-- <select class="js-states browser-default select2" name="shopping_id" required id="shopping_id">
        <option value="option_select" disabled selected>Departments</option>
        @foreach($shoppings as $shopping)
        <option value="{{ $shopping->id }}" {{$company->shopping_id == $shopping->id  ? 'selected' : ''}}>{{ $shopping->fantasyname}}</option>
        @endforeach
    </select> --}}
    
    
    
    
    
    
    
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
                            
                            <input type="text" class="form-control" id="coursecode" name="multiInput[0][coursecode]" required>
                        </td>
                        
                    </div>
                    
                    
                    <div class="col-md-10">
                        <td class="">
                            <!-- <label for="inputCourseTitle">Course Title</label> -->
                            <input type="text" class="form-control" size="195" id="title" name="multiInput[0][title]" required>
                        </td>
                    </div>
                    
                    
                    <div class="form-group col-md-8">
                        
                        <td>
                            <!-- <label for="inputUnit">Unit</label> -->
                            <select id="unit" name="multiInput[0][unit]" class="form-control niceSnippetsExample" required>
                                <option value="">Choose...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                    </div>
                    
                    
                    <div class="form-group col-md-8">
                        <td>
                            <!-- <label for="inputStatus">Status</label> -->
                            <select id="status" name="multiInput[0][status]" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="C">C</option>
                                <option value="E">E</option>
                                
                            </select>
                            
                        </td>
                    </div>
                    
                    
                    
                    <div class="form-group col-md-8">
                        <td>
                            <!-- <label for="inputSemester">Semester</label> -->
                            <select id="semester" name="multiInput[0][semester]" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="First ">First</option>
                                <option value="Second ">Second</option>
                                
                            </select>
                        </td>
                    </div>
                    
                    
                    <div class="form-group col-md-8">
                        <td>
                            <!--  <label for="inputSemester">Is General</label> -->
                            
                            <select id="general" name="multiInput[0][isgeneral]" class="form-control" required>
                                <option value="">Choose...</option>
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
        </div>
    </div>
    
    <button type="submit" value="sumbit" class="btn btn-success">Save</button>
</form>



</div>



</div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var i = 0;
    $("#addRemoveIp").click(function () {
        ++i;
        
        $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][coursecode]" class="form-control"required <tr><td><input type="text" name="multiInput['+i+'][title]" class="form-control"required <tr><td><select name = multiInput['+i+'][unit]" class="form-control" required> <option value="">Choose...</option> <option>  1 </option> <option> 2 </option>  <option> 3 </option> <option> 4 </option> <option> 5 </option><option> 6 </option></select></td> <td><select name = multiInput['+i+'][status]" class="form-control"required> <option value="">Choose...</option> <option>  C </option> <option> E </option> </select></td> <td><select name = multiInput['+i+'][semester]" class="form-control"required> <option value="">Choose...</option> <option>  First  </option> <option> Second  </option> </select> <td><select name = multiInput['+i+'][isgeneral]" class="form-control" required> <option value="">Choose...</option> <option value="0">  No </option> <option value="1"> Yes </option> </select></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr> ');
        
        
        
        
        //latest working:- $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][coursecode]" class="form-control" <tr><td><input type="text" name="multiInput['+i+'][title]" class="form-control" <tr><td><select name = multiInput['+i+'][unit]" class="form-control"> <option>  1 </option> <option> 2 </option></select></td> <td><select name = multiInput['+i+'][status]" class="form-control"> <option>  C </option> <option> E </option> </select></td></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr> ' );
        
        
        //working:- $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][coursecode]" class="form-control" <tr><td><input type="text" name="multiInput['+i+'][title]" class="form-control" <tr><td><select name = multiInput['+i+'][unit]" class="form-control"> <option value="1"> 1 </option> <option value="1"> 2 </option> </select></td></td></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr> ' );
        
        //  $("#multiForm").append('<tr><td><select name = multiInput['+i+'][unit]" class="form-control"> <option> PHP </option></select></td></tr>');
        
        
    });
    
    
    $(document).on('click', '.remove-item', function () {
        $(this).parents('tr').remove();
    });
    
    
    
</script>




@endsection




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
