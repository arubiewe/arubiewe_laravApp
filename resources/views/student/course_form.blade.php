{{-- @extends('layouts.student_master')
@section('content') --}}
<!DOCTYPE html>
<html>

<head>
    <title> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-print.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/water_mark.css') }}" type="text/css" rel="stylesheet">

</head>


<body >
  
    <section class="" id="printableArea">
        {{-- <style>
  table, th, td {
    border: 1px solid grey;
    
  
  }
  table {
    
    border-spacing: 0px;
     
  }

  table {
  width: 100%;
}
  
  </style> --}}
        <div class="container alert-primary" align="center">

            <h4>
                <center><strong> ADENIRAN OGUNSANYA COLLEGE OF EDUCATION </strong></center>
            </h4>
            <h5>
                <center> KM 30, BADAGRY EXPRESSWAY, OTO/IJANIKIN LAGOS. </center>
            </h5>
            <center>
                @foreach ($registration->take(1) as $reg)
                    <p><b>COURSE REGISTRATION FORM - {{ $reg->session }} Session </b> </p>
                @endforeach
            </center>

        </div>

        <div class="container">



            <img src="{{ asset('storage/images/students/' . Auth::guard('students')->user()->image_path) }}"
                class="img-thumbnail" alt="" width="100px" height="100px" align="left"> </p>
            <img src="{{ asset('images/logo.png') }}" alt="" width="100px" height="100px" align="right">
        </div>

        <h5>
            <b><center>PERSONAL INFORMATION</center></b>
        </h5>
        
        <div class="container-fluid">
            <div class="container">
                <table  class="table table border-dark"  cellpadding="0" cellspacing="0">
                    <div class="watermark">@ online registration</div>
                    <tr style="height:5px;">
                        <td class="table-bordered" width="100px" style="padding:6px; padding-left:10px; margin:0px; border-color: black;">Matric No: </td>
                        <td class="table-bordered"   colspan="3" style="padding:6px; padding-left:10px; margin:0px; border-color: black;"> {{ Auth::guard('students')->user()->matric_no }} </td>
                    </tr>
                    <tr style="height:10px; ">
                        <td class="table-bordered" style="padding:6px;  padding-left:10px; margin:0px; border-color: black;">  Surname:</td>
                        <td class="table-bordered"  style="padding:6px; padding-left:10px; border-color: black; margin:0px;" width="140px; " > {{ Auth::guard('students')->user()->surname }} </td>
                        <td class="table-bordered" style="padding:6px; padding-left:10px; margin:0px; border-color: black;">Other Names: {{ Auth::guard('students')->user()->other_names }} </td>
                        <td class="table-bordered" style="border-color: black;"></td>
                    </tr>
                   
                    <tr style="height:10px;">
                        <td class="table-bordered"   style="padding:0px; padding-left:10px; margin:0px; border-color: black;">Date of Birth: </td>
                        <td class="table-bordered"  style="padding:0px; padding-left:10px; border-color: black; margin:0px;" width="140px " > {{ Auth::guard('students')->user()->dob }}</td>
                        <td class="table-bordered"  style="padding:0px; padding-left:10px; margin:0px; border-color: black;">Gender: {{ Auth::guard('students')->user()->gender }} </td>
                        <td class="table-bordered" style="border-color: black;"></td>
                    </tr>
                    <tr style="height:10px;">
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;">State: </td>
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;">{{ Auth::guard('students')->user()->state }}</td>
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;">Local Govt: {{ Auth::guard('students')->user()->lga }} </td>
                      <td class="table-bordered" style="border-color: black;"></td>
                    </tr>
                    <tr style="height:10px;">
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;">Nationality</td>
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;">{{ Auth::guard('students')->user()->nationality }}  </td>
                        <td class="table-bordered"  style="border-color: black;"></td>
                      
                        <td class="table-bordered" style="padding:0px; padding-left:10px; margin:0px; border-color: black;"></td>
                    </tr style="height:20px;">
                    <tr style="height:20px;">
                        <td class="table-bordered" style="padding:4px; padding-left:10px; margin:0px; border-color: black;">School:</td>
                        <td class="table-bordered" style="padding:4px; padding-left:10px; margin:0px; border-color: black;">{{ Auth::guard('students')->user()->school }}                                                </td>
                        <td class="table-bordered" style="padding:4px; padding-left:10px; margin:0px; border-color: black;">Combination: {{ Auth::guard('students')->user()->combination }}  </td>
                        <td class="table-bordered" style="border-color: black;"></td>
                    </tr>
                    <tr>
                        <td class="table-bordered" style="padding:6px; padding-left:10px; margin:0px; border-color: black;">Address:  </td>
                        <td class="table-bordered" colspan="3" style="padding:6px; padding-left:5px; margin:0px; border-color: black;"> {{ Auth::guard('students')->user()->address }}</td>
                       
                    </tr>  
                    <tr style="height:20px;">
                        <td class="table-bordered"  style="padding:5px; padding-left:10px; margin:0px; border-color: black;">Email:  </td>
                        <td class="table-bordered" width="140px"  style="padding:4px; padding-left:10px; margin:0px; border-color: black;"> {{ Auth::guard('students')->user()->email }}</td>
                        <td class="table-bordered"  style="padding:5px; padding-left:10px; margin:0px; border-color: black;">Phone Number: {{ Auth::guard('students')->user()->phone }} </td>
                        {{-- <td width="140px"  style="padding:0px; padding-left:10px; margin:0px;"> 07015652785</td> --}}
                        <td class="table-bordered" style="border-color: black;"></td>
                    </tr>
                   
                    <tr style="height:20px;">
                        <td class="table-bordered"  style="padding:0px; padding-left:10px; margin:0px; border-color: black;">Bursary Number: </td>
                        <td class="table-bordered" width="140px"  style="padding:0px; padding-left:10px; margin:0px; border-color: black;"> </td>
                        <td class="table-bordered"  style="padding:4px; padding-left:10px; margin:0px; border-color: black;">Current Level: {{ Auth::guard('students')->user()->current_level }} L </td>
                        <td class="table-bordered" width="140px"  style="padding:4px; padding-left:10px; margin:0px; border-color: black;"> </td>
                    </tr>
                    @foreach ($registration->take(1) as $reg)
                    <p>    <b>Registered at:</b> {{ $reg->reg_by }} </p>
                    
                
                @endforeach                            
                </table>
                
              



                {{-- <table>
                    <tr>
                        <b>Matric No :</b> {{ Auth::guard('students')->user()->matric_no }} <br />
                        <b>Surname :</b> {{ Auth::guard('students')->user()->surname }} </p>
                        <p><b>Other Names :</b> {{ Auth::guard('students')->user()->other_names }} &nbsp; &nbsp; &nbsp;
                            <b>Gender:</b> {{ Auth::guard('students')->user()->gender }}</p>
                        <p><b>Combination :</b> {{ Auth::guard('students')->user()->combination }} &nbsp; &nbsp; &nbsp;
                            <b>School:</b> Sciences</p>
                        <p><b>Current Level :</b> {{ Auth::guard('students')->user()->current_level }} L </p>
                        @foreach ($registration->take(1) as $reg)
                            <p><b>Accredited:</b> {{ $reg->reg_by }} </p>


                    </tr>
                    @endforeach

                </table> --}}
                <br>


                <table style="height: 1px;" class="table">

                    <tr>
                        {{-- <td>Id</td> --}}
                        {{-- <th>Course Id</th> --}}

                        <th><b>Course Code</b></th>
                        <th><b>Course Title</b></th>
                        <th><b>Unit</b></th>
                        <th><b>Status</b></th>

                        <th><b>Semester</b></th>
                        <th><b>Curriculum</b></th>
                        <th><b>Lecturers Sign</b></th>



                   </tr>



                    {{-- @foreach (array_merge($courses) as $course) --}}


                    @foreach ($registration as $reg)
                        <tr>
                            {{-- <td><input type="checkbox" name="course[]" value="{{$course['id']}} {{$course['course_code']}}"></td> --}}

                            {{-- <th scope="row">1</th> --}} {{-- <td>{{ $course-> id }}</td> --}}
                            {{-- <td>{{ $course-> course_id }}</td> --}}
                            <td> {{ $reg->course->course_code }}</td>
                            <td> {{ $reg->course->course_title }}</td>
                            <td>{{ $reg->course->course_unit }}</td>
                            <td>{{ $reg->course->course_status }}</td>
                            <td> {{ $reg->course->semester }}</td>
                            <td> {{ $reg->course->is_oldcurriculum }}</td>
                            <td></td>
                            


                            {{-- <td> {{$reg->curriculum->name}}</td> --}}

                            {{-- <td>{{ $reg['course_title'] }}</td>
<td>{{ $reg['semester'] }}</td> --}}

                        </tr>
                    @endforeach

                </table>

                <table>

                  <div class="row">
                      <tr>
                          <div class="col col-md-6">
                              <td align="left" style="padding-right:400px; padding-top:8px">

                                <h5 align="center"> __________________________ <br />
                                                        Student Signature </h5>

                              </td>
                          </div>
                      </tr>
                  </div>
                </table>

                <table>

                    <div class="row">
                        <tr>
                            <div class="col col-md-6">
                                <td align="left" style="padding-right:40px; padding-top:8px">
                                    <h5 align="center">_____________________________<br>
                                        Head of Department</h5>
                                </td>
                            </div>

                            <div class="col col-md-6" align="right" float:right>
                                <td align="right" style="padding-left:300px; padding-top:8px;">
                                    <h5 align="center">_____________________________<br>
                                        Sign and Date</h5>
                                </td>
                            </div>
                        </tr>

                        <tr>
                            <div class="col col-md-6">
                                <td align="left" style="padding-right:40px; padding-top:8px">
                                    <h5 align="center">_____________________________<br>
                                        School Officer </h5>
                                </td>
                            </div>

                            <div class="col col-md-6" align="right" float:right>
                                <td align="right" style="padding-left:300px; padding-top:8px;">
                                    <h5 align="center">_____________________________<br>
                                        Sign and Date </h5>
                                </td>
                            </div>
                        </tr>

                        <tr>
                            <div class="col col-md-6">
                                <td align="left" style="padding-right:40px; padding-top:8px">
                                    <h5 align="center">_____________________________<br>
                                        Dean of School
                                </td>
                            </div>

                            <div class="col col-md-6" align="right" float:right>
                                <td align="right" style="padding-left:300px; padding-top:8px;">
                                    <h5 align="center">_____________________________<br>
                                        Sign and Date
                                </td>
                            </div>
                        </tr>




                </table>

                {{-- <div class="row">
  <div class="col col-md-2" align="">

__________________<br>
Head of Department
</div>

<div class="col col-md-2 mt-4" style="float: right">
__________________<br>
  Sign and Date
</div>

</div> --}}
    </section>
    {{-- <button class="btn btn-primary" onclick="window.printDiv('printableArea')">Print</button> --}}

    <div class="row no-print">
        <div class="col-xs-12" align="center">
            <button class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print"></i>
                Print</button>
        </div>
    </div>
    </div>
    </div>


    <script language="JavaScript" type="text/javascript">
        function printDiv(divName) {
            window.print();
        }
    </script>

</body>

</html>





{{-- @endsection --}}
