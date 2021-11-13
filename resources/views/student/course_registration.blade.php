@extends('layouts.student_master')
@section('content')

                    <h2>Welcome to Course Reg</h2>

                  
            {{-- {{ $course->course_code }} - {{$course->course_title}} --}}
                   
            <div class="container">
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
            <td><input type="checkbox" name="course[]" value="{{$course['id']}} {{$course['course_code']}}" class="check_all"></td>
            {{-- <th scope="row">1</th> --}} {{-- <td>{{ $course-> id }}</td> --}}
            {{-- <td>{{ $course-> course_id }}</td> --}}
            <td> {{ $course['course_code'] }}</td>
            <td>{{ $course['course_title'] }}</td>
            <td>{{ $course['semester'] }}</td>
            
        </tr>
            @endforeach

           
        </tbody>
      
               
    </table>
    <button type="submit" name="course[]" class="btn btn-success"> CheckAll </button>
    <div class="" align="center">
    <button type="submit" name="" class="btn btn-danger"> Register </button>
    </div>

                </form>
            </div>      


            <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
    $(".check_all").on("click", function(){
        $(".course[]").each(function(){
            $(this).attr("checked", true);
        });
    });
</script>
 @endsection