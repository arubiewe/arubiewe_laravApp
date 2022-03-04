@extends('layouts.student_master')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <title> Profile Update </title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

  </head>

<body>

    <div class="panel panel-success">
        <div class="panel-body" align="center">
          <h2>Profile Update</h2>
        </div>

    <form method="POST" action="{{action('StudentController@profile', $id)}}" enctype="multipart/form-data">
    {{@csrf_field()}}
    <input type="hidden" name="_method" value="PATCH" />

    {{-- @foreach ($profiles as $profile) --}}
      
      <div class="container-fluid">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputSurname">Surname</label>
            <input type="text" id="surname"  name="surname" value="{{ Auth::guard('students')->user()->surname }}" class="form-control" >
            
      
          </div>
          <div class="form-group col-md-6">
            <label for="inputOtherNames">Other Names</label>
            <input type="text" id="other_names" name="other_names" value="{{ Auth::guard('students')->user()->other_names }}" class="form-control" >
          </div>
        </div>
 
      
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputMatric">Matric No</label>
            <input type="text" id="matric_no" name="matric_no" value="{{ $profiles->matric_no }}" class="form-control" readonly>
          </div>

         
            <div class="form-group col-md-2">
              <label for="inputSchool">School</label>
              <select required id="school" name="school"  class="form-control">
                <option> {{ $profiles->school }}</option>
                <option value="SASS">SASS</option>
                <option value="SOS">SOS</option>
                <option value="SLANG">SLANG</option>
              </select>
            </div>

            
                <div class="form-group col-md-4">
                  <label for="inputCombination">Combination</label>
                  <select required id="combination" name="combination" class="form-control">
                    <option>{{ $profiles->combination }}</option>
                    <option value="COMPUTER/PHYSICS">COMPUTER/PHYSICS</option>
                    <option value="PHYSICS/MATHEMATICS">PHYSICS/MATHEMATICS</option>
                    <option value="ENGLISH DOUBLE MAJOR">ENGLISH DOUBLE MAJOR</option>
                  </select>
                </div>

            
          
          <div class="form-group col-md-2">
            <label for="inputLevel">Level</label>
            <select required id="level" name="level" class="form-control">
              <option>{{ $profiles->current_level }} </option>
              <option value="100">100</option>
              <option value="200">200</option>
              <option value="300">300</option>
            </select>
          </div>
           </div>



        <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputGender">Gender</label>
                <select required id="gender" name="gender" class="form-control">
                  <option> {{ $profiles->gender }}</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  
                </select>
              </div>
  
              
                  
                    <div class="form-group col-md-2">
                        <label for="inputDateOfBirth">Date of Birth</label>
                        <input type="date" id="dob" name="dob" value="{{ $profiles->dob }}" class="form-control" >
                      </div>
                 
  
              
           
            <div class="form-group col-md-4">
              <label for="inputEmail">Email</label>
              <input type="email" id="email" name="email" value="{{ $profiles->email }}" class="form-control" >
            </div>
             
            <div class="form-group col-md-4">
                <label for="inputPhone">Phone Number</label>
                <input type="phone" id="phone" name="phone" value=" {{ $profiles->phone }}" class="form-control" >
              </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Address</label>
              <input type="text" id="address" name="address" value="{{ $profiles->address }}" class="form-control" >
            </div>

                     
          <div class="form-group col-md-2">
            <label for="inputNationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" value="{{ $profiles->nationality }}" class="form-control" >
          </div>
           
          <div class="form-group col-md-2">
            <label for="State" class="control-label">State of Origin</label>
            <select onchange="toggleLGA(this);"name="state" id="state"  class="form-control">
            <option  selected="selected">{{ $profiles->state }}</option>
           
            <option value="Abia">Abia</option>
            <option value="Adamawa">Adamawa</option>
            <option value="AkwaIbom">AkwaIbom</option>
            <option value="Anambra">Anambra</option>
            <option value="Bauchi">Bauchi</option>
            <option value="Bayelsa">Bayelsa</option>
            <option value="Benue">Benue</option>
            <option value="Borno">Borno</option>
            <option value="Cross River">Cross River</option>
            <option value="Delta">Delta</option>
            <option value="Ebonyi">Ebonyi</option>
            <option value="Edo">Edo</option>
            <option value="Ekiti">Ekiti</option>
            <option value="Enugu">Enugu</option>
            <option value="FCT">FCT</option>
            <option value="Gombe">Gombe</option>
            <option value="Imo">Imo</option>
            <option value="Jigawa">Jigawa</option>
            <option value="Kaduna">Kaduna</option>
            <option value="Kano">Kano</option>
            <option value="Katsina">Katsina</option>
            <option value="Kebbi">Kebbi</option>
            <option value="Kogi">Kogi</option>
            <option value="Kwara">Kwara</option>
            <option value="Lagos">Lagos</option>
            <option value="Nasarawa">Nasarawa</option>
            <option value="Niger">Niger</option>
            <option value="Ogun">Ogun</option>
            <option value="Ondo">Ondo</option>
            <option value="Osun">Osun</option>
            <option value="Oyo">Oyo</option>
            <option value="Plateau">Plateau</option>
            <option value="Rivers">Rivers</option>
            <option value="Sokoto">Sokoto</option>
            <option value="Taraba">Taraba</option>
            <option value="Yobe">Yobe</option>
            <option value="Zamfara">Zamafara</option>
          </select>
            </div>


            <div class="form-group col-md-2">
                <label class="control-label">LGA of Origin</label>
               
                <select name="lga" id="lga" class="form-control select-lga" required >
                  <option  selected="selected">{{ $profiles->lga }}</option>
                </select>
              </div>

            
                <div class="form-group col-md-6">
                  <label for="inputKinName">KIN Name</label>
                  <input type="text" id="kinname" name="kinname" value="{{ $profiles->kin_name }}" class="form-control" >
                </div>
    
                         
              <div class="form-group col-md-4">
                <label for="KIn Phone">KIN Phone No</label>
                <input type="number" id="kin_number" name="kin_no" value="{{ $profiles->kin_phone }}" class="form-control" >
              </div>
               
              <div class="form-group col-md-2">
                <label for="BloodGroup" class="control-label">Blood Group</label>
                <select name="bloodgrp" id="bloodgrp" class="form-control">
                {{-- <option value="" selected="selected">- Select -</option> --}}
                <option  selected="selected">{{ $profiles->blood_group }}</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="A-">A-</option>
                <option value="B-">A-</option>
                <option value="B+-">B+</option>
                
              </select>
                </div>

               
                 <div class="row">  
                <div class="form-group alert alert-danger">
                    <label for="Passport">Upload Passport</label>
                    <input type="file" name="image"  class="form-control-file" id="PassportUpload">
                
                </div>
                 </div>
        </div>

                <div class="" align="center">
                    <button type="submit" class="btn btn-success">Update Data</button>
                  </div> 
                
                 
      </div>

      {{-- @endforeach  --}}




















      </div>
    
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <script src="{{ asset ('js/lga.min.js') }}"></script>
</body>
</html>

@endsection