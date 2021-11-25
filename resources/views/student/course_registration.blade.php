@extends('layouts.student_master')
@section('content')

    <div class="container alert-primary" align="center" >
                    <h2>Course Registration</h2>
                   
                    @foreach($session as $sesn)
                   <h5> {{ $sesn->session }} Academic Session</h5>
                   <marquee class="alert-danger"><b>Note:</b> Please ensure you select the appropriate/correct course for this section, without a successful course registration, No Result</marquee>
@endforeach
    </div>
    <hr/>  
    
            {{-- {{ $course->course_code }} - {{$course->course_title}} --}}
                   
            <div class="container alert-primary">
                <form action="course_registration" method="POST" >  
                    @csrf
            <table class="table table-hover">
                    
                <thead>
                  <tr>
                {{-- <td>Id</td> --}}
                {{-- <th>Course Id</th> --}}
                <th>#</th>
                <th>Course Code</th>
                <th>Course Title</th>
                {{-- <th>Unit</td>
                <th>Status</td> --}}
                <th>Semester</td>
              
                </tr>
                </thead>
          
        
                {{-- @foreach(array_merge($courses) as $course) --}}
               
            
            @foreach ($courses as $course)
           

            <tbody>
                
          
        <tr>
            <tr id="course{{$course['id']}}">
            {{-- <td><input type="checkbox" name="course[]" value="{{$course['id']}} {{$course['course_code']}}"></td> --}}
            <td><input type="checkbox" name="course[]" value="{{$course['id']}}" class="checkbox"></td>
            {{-- <th scope="row">1</th> --}} {{-- <td>{{ $course-> id }}</td> --}}
            {{-- <td>{{ $course-> course_id }}</td> --}}
            <td> {{ $course['course_code'] }}</td>
            <td>{{ $course['course_title'] }}</td>
            <td>{{ $course['semester'] }}</td>
            
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