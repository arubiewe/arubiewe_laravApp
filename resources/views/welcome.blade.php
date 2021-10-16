<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Laravel</title>

 

            <div class="content">
                <div class="title m-b-md">
                    Welcome to <br>
                   
           
                    <table class="table table-hover">
                        <thead>
                          <tr>
                        {{-- <td>Id</td> --}}
                        {{-- <th>Course Id</th> --}}
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Unit</td>
                        <th>Status</td>
                        <th>Semester</td>
                      
                        </tr>
                        </thead>
                  
                
                 <tbody>
                    @foreach ($courses as $course)    
                <tr>
                    {{-- <th scope="row">1</th> --}}
                    {{-- <td>{{ $course-> id }}</td> --}}
                    {{-- <td>{{ $course-> course_id }}</td> --}}
                    <td>{{ $course-> course_code }}</td>
                    <td>{{ $course-> course_title }}</td>
                    <td>{{ $course-> course_unit }}</td>
                    <td>{{ $course-> status }}</td>
                    <td>{{ $course-> semester }}</td>
                    
                </tr>
                @endforeach
                 </tbody>
                    </table>
               
                </div>
                
                
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>
