<!DOCTYPE html>
<html>
  <head>
    <title> Course Form </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>

<body>

    <div class="container alert-primary" align="center" >
   
   
        <hr/> 
        
        <h4> <center> ADENIRAN OGUNSANYA COLLEGE OF EDUCATION </center></h4> <h4><center> KM 30, BADAGRY EXPRESSWAY, OTO/IJANIKIN LAGOS. </center></h4>    
            <center>
               @foreach($session as $sesn)
              <h5> COURSE REGISTRATION FORM - {{ $sesn->session }} Academic Session </h5>
           @endforeach
         </center>
         
        </div>
        
        <div class="container">
          <img src="{{ asset ('storage/images/students/'. Auth::guard('students')->user()->image_path ) }}" alt="" width="100px" height="100px" align="left">   </p>
          <img src="{{ asset ('images/logo.png') }}" alt="" width="100px" height="100px" align="right">
        </div>
        
          <h5><center>PERSONAL INFORMATION</center></h5>
        
        
        <div class="container-fluid">
          <table>
         <tr>
              <b>Matric No :</b> {{Auth::guard('students')->user()->matric_no }} <br/>
              <b>Surname :</b> {{Auth::guard('students')->user()->surname }} </p>
              <b>Other Names :</b> {{Auth::guard('students')->user()->other_names }}  </p>
              <p><b>Combination :</b> {{Auth::guard('students')->user()->combination }} </p>
              <p><b>Combination :</b> </p>
            
         </tr>
        
          </table>
        <br>
        
        
<table style="height: 1px;" class="table">
                            
              <tr>
            {{-- <td>Id</td> --}}
            {{-- <th>Course Id</th> --}}
           
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Unit</td>
            <th>Status</td>
        
            <th>Semester</td>
          
            </tr>
          
        
        
            {{-- @foreach(array_merge($courses) as $course) --}}
           
        
        @foreach ($courses as $course)
            
        <tr>

        <td> {{$course->course->course_code}}</td>
        <td>  {{$course->course->course_title}}</td>
        <td> {{$course->course->course_unit}}</td>
        <td>{{$course->course->course_status}}</td>
        <td> {{$course->course->semester}}</td>
        
        
        </tr>
        @endforeach
        
        
        
        </table>
        <button class="btn btn-primary" onclick="window.print()">Print</button>











</body>
</html>
