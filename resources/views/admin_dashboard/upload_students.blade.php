@extends('layouts.admin_master')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">


<title>Student Upload </title>



<div class="container-fluid">
    <div class="col-md-28">
        @if(Session::has('success'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
    </div>
    
    <div class="jumbotron alert alert-grey">
       


        <h5>Students Batch Upload </h5>
        
        <form method="POST" action="{{route('import_student')}}" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-6">
            <select id="optiondepttmajor" name="optiondepttmajor" class="form-control col-md-8 dynamic" data-live-search="true" required >
                <option value="">Choose Major Department</option>
                @foreach ($optiondepttmajor as $optionmajor)
                
                    <option value="{{ $optionmajor->id }}">{{ $optionmajor->name }}</option>
                
                @endforeach
            </select>
                </div>

            <div class="col-md-6">
            <select id="optiondepttminor" name="optiondepttminor" class="form-control col-md-8 dynamic" data-live-search="true" required >
                <option value="">Choose Minor Department</option>
                @foreach ($optiondepttminor as $optionminor)
                
                    <option value="{{ $optionminor->id }}">{{ $optionminor->name }}</option>
                
                @endforeach
                
            </select>
              
                </div>
            </div>
           
            <br>
            <div class="row">
                <div class="col col-md-12">
                    <p><input type="file" id="exampleInputFile" name="excel_file" class="form-control col-md-3" required > <br> 
                    
                       
                    
                </div>
                <button type="submit" value="sumbit" class="btn btn-danger">Upload</button></p>
            </div>
           
        </form>
    </div>

    

<hr>

{{-- <form method="POST" action="/admin_dashboard/upload_students" >
    @csrf
    <h5> Select Department </h5>
  
    <select id="optiondept" name="optiondept" class="form-control col-md-8 dynamic" required >
        <option value="">Choose...</option>
        @foreach ($department as $optiondept)
        
        <option value="{{ $optiondept->id }}">{{ $optiondept->name }}</option>
        
        @endforeach
    </select>
    <select id="unitq" name="dptq" class="form-control col-md-8" required >
        <option value="">Choose...</option>
        <option value="C">Department</option>
        <option value="E">Cpomputer</option>
    </select>
    
    
    <select class="js-states browser-default select2" name="shopping_id" required id="shopping_id">
        <option value="option_select" disabled selected>Departments</option>
        @foreach($shoppings as $shopping)
        <option value="{{ $shopping->id }}" {{$company->shopping_id == $shopping->id  ? 'selected' : ''}}>{{ $shopping->fantasyname}}</option>
        @endforeach
    </select>
    
    
    
    
    
</form> --}}
</div>









{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
{{-- <script>
    var i = 0;
    $("#addRemoveIp").click(function () {
        ++i;

    
        
        $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][coursecode]" class="form-control"required <tr><td><input type="text" name="multiInput['+i+'][title]" class="form-control" required <tr><td><select name="multiInput['+i+'][unit]" class="form-control"> <option value="">Choose...</option> <option>  1 </option> <option> 2 </option>  <option> 3 </option> <option> 4 </option> <option> 5 </option><option> 6 </option></select></td> <td><select name = "multiInput['+i+'][status]" class="form-control" > <option value="">Choose...</option> <option>  C </option> <option> E </option> </select></td> <td><select name="multiInput['+i+'][semester]" class="form-control" > <option value="">Choose...</option> <option>  First  </option> <option> Second  </option> </select> <td><select name ="multiInput['+i+'][multiInput[0][isoldcurriculum]" class="form-control" > <option value="">Choose...</option> <option value="1">  Yes </option> <option value="0"> No </option> </select></td> <td><select name ="multiInput['+i+'][isgeneral]" class="form-control" > <option value="">Choose...</option> <option value="0">  No </option> <option value="1"> Yes </option> </select></td>   <td><select name ="multiInput['+i+'][multiInput[0][level]" class="form-control" > <option value="">Choose...</option> <option value="100">  100 </option> <option value="200"> 200 </option> <option value="300"> 200 </option> </select></td>   <td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr> ');
        
    });
    
    
    $(document).on('click', '.remove-item', function () {
        $(this).parents('tr').remove();
    });
    
    
    
</script> --}}



@endsection




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
