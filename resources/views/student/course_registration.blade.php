@extends('layouts.student_master')
@section('content')

    <div class="container alert-primary" align="center" >
                    <h2>Student Course Registration</h2><hr>
                   
                    @foreach($session as $sesn)
                   <h5> {{ $sesn->session }} Academic Session</h5>
                   <marquee class="alert-primary"><b>Note:</b> Please ensure you select the appropriate/correct course for this section, without a successful course registration, No Result</marquee>
@endforeach

@if ($message =  Session::get('errormsg'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong> {{ $message }} </strong>
</div> 

   
@endif


@if( $message2  = Session::get('success2'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
    {{-- {{Session::get('success2')}} --}}
    <strong> {{ $message2 }} </strong>
</div>
@endif

    </div>


   


    <hr/>  

    <form action="course_registration" method="POST" >  
        @csrf
{{-- <div class="row">
    <div class="form-group col-md-4">
        <td>
             <label for="opySession">Choose Session</label>
            <select id="optsession" name="optsession" class="form-control" required>
                <option value="">Choose...</option>
                <option value="2020/2021">2020/2021</option>
                <option value="2022/2023">2022/2023</option>
                <option value="2023/2024">2023/2024</option>
                
            </select>
        </td>
    </div>


    <div class="form-group col-md-4">
        <td>
             <label for="opySemester">Choose Semester</label>
            <select id="opptsemester" name="optsemester" class="form-control" required>
                <option value="">Choose...</option>
                <option value="1">First</option>
                <option value="2">Second</option>
                
                
            </select>
        </td>
    </div>
</div> --}}
   
            {{-- {{ $course->course_code }} - {{$course->course_title}} --}}
                   
            <div class="container alert-primary">
               
              
            <table class="table table-hover">
                    
                <thead>
                  <tr>
                {{-- <td>Id</td> --}}
                {{-- <th>Course Id</th> --}}
                <th>#</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</td>
                <th>Status</td>
                <th>Semester</td>
                <th> Curriculum </th>
              
                </tr>
                </thead>
          
        
                {{-- @foreach(array_merge($courses) as $course) --}}
               
            
            @foreach ($courses as $course)
           

            <tbody>
                
          
        <tr>
            <tr id="course{{$course['id']}}">
            {{-- <td><input type="checkbox" name="course[]" value="{{$course['id']}} {{$course['course_code']}}"></td> --}}
            <td><input type="checkbox" name="course[]" value="{{$course['id']}}" class="checkbox" ></td>
            {{-- <th scope="row">1</th> --}} {{-- <td>{{ $course-> id }}</td> --}}
            {{-- <td>{{ $course-> course_id }}</td> --}}
            <td> {{ $course['course_code'] }}</td>
            <td>{{ $course['course_title'] }}</td>
            <td>{{ $course['course_unit'] }}</td>
            <td>{{ $course['course_status'] }}</td>
            <td>{{ $course['semester'] }}</td>
            <td>{{ $course['is_oldcurriculum'] }}</td>
            
        </tr>
            @endforeach

           
        </tbody>
      
               
    </table>
    <button type="submit" name="selectAll" class="btn btn-success"> CheckAll </button>
    <div class="" align="center">
    <button type="submit" name="" class="btn btn-danger"> Register </button>
    </div>

                </form>
            </div>      




            <script>
<script type="text/javascript" profile="javascript" src=" http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
	</script>
<script>
         $(document).ready(function() {
             // select All
             $('.selectAll').click(function() {
                 $(":checkbox").attr("checked", true);
             });
             // deselect All
             $('.deselectAll').click(function() {
                 $(":checkbox").attr("checked", false);
             });
         });
      </script>
  
</script>
 @endsection