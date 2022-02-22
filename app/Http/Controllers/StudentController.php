<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ActiveCourse, Course };
use App\{GenCourse , GeneralCourse, AcademicSession, StudentRegistration};
Use App\{RegHistory, Semester};
use DB;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use App\Models\GeneralCourse;
use View;
use Validator;
use Session;

class StudentController extends Controller
{
    //
    public function index(){


        
       return view('student.login');

    }

    public function dashboard(){
        
        $dashbaordSession = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
        return View::make("student/dashboard", compact('dashbaordSession'));
       // return view('student.dashboard');

}
    

    
    public function show(){

       $uss = Auth('students')->user()->department_id;

       dd($uss);

    
    }

    public function create(){
    


        return view('student.course_registration');


    }


    public function store(Request $request){   
      
        $loggedUser = Auth('students')->user()->id;
        $loggedUserMatric = Auth('students')->user()->matric_no;
        $user = StudentRegistration::where('student_id', '=', $loggedUser)->first();
        
        $semester = Semester::where('id', 1)->value('semester_name');
     //dd($semester);
      
        $choose_course = $request->input('course');
        if ($user === null) {
        foreach($choose_course as $choose){
        
        $session = AcademicSession::where('id', 1)->value('session');
        
     
        $registrations = new StudentRegistration();
        $data = ['student_id' => $loggedUser, 'course_id' => $choose];
        $registrations->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'course_id' => $choose, 'session' => $session]
        );
        
        $reg_history = new RegHistory();
        $data = ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric];
        $reg_history->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric, 'session' => $session, 'semester' => $semester]
        );

      
    }

    return redirect()->back()->with('success2', 'Course Registration is Successful');


    

        }
        else { 
            
            $session = AcademicSession::where('id', 1)->value('session');
            
           // return 'You have registered already for the '. $session . ' Academic Session' ;
            return redirect()->back()->with('errormsg', 'You have registered already for the ' . $session .  ' Academic Session' );  
        
        }


    }

    public function studentcourse(){

        $department_id = Auth('students')->user()->department_id;
        $department_minor_id = Auth('students')->user()->department_minor_id;
        //$sessions = AcademicSession::where('id', 1)->value('session');
       // $courses = Course::where(['department_id' => $department_id, 'department_id'=> 5 ] )->get();//orWhere ('department_id', $department_minor_id)->get();
        //dd($sessions);
       // $courses = Course::where([['department_id', '=', 1]])->where('department_id', 5)->orWhere('department_id', $department_minor_id)->get();
       $session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
       //$session = AcademicSession::where('id', 1)->value('session');
        $courses = Course::where('department_id', '=', 5)
                        ->orWhere('department_id', '=', $department_id)
                        ->orWhere('department_id', '=', $department_minor_id)
                        ->get();
        //$courses = DB::SELECT("SELECT * FROM courses WHERE department_id = 5 AND department_id = '$department_id'");
        //dd($courses);
        //$gen_course_id = 10001;
        //$general_courses = GeneralCourse::where('department_id', 10001  )->get()->toArray();
       // $courses = array_merge($general_courses , $dptcourses);        
        //dd($department_minor_id);
       // return 'my courses';
         return View::make("student/course_registration", compact('courses', 'session'));
         //return View::make("student/course_registration", compact('session'));
    }
    
    

    public function studentcourseregistration(){

        //$student_id = Auth('students')->user()->id;



        $session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
       $registration = StudentRegistration::where( 'student_id',  Auth('students')->user()->id )
                                            ->with('student', 'course')->get();

       // $reg = StudentRegistration::where('student_id', 2)->with('student', 'course')->get();
                       
        //dd($registration);

        return View::make("student/course_form", compact('registration', 'session'));

    }

    public function showreghistory($id)
    {
        $session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
        
        
       
        $studentcourses = RegHistory::with('course', 'student' )->findOrFail($id);
        $semesters = Semester::with('reghistory', 'student')->findOrFail($id);

        //dd($semesters);
       
       // $courses = StudentRegistration::where('student_id', $studentcourses->student_id)->where('session', $studentcourses->session)->get();
       $courses = StudentRegistration::where('student_id', Auth('students')->user()->id )->where('session', '=', 2020/2021 )->orWhere('semester_id', $semesters->id )->get();
       //dd($courses);
       
        return view('student.registration_history', compact('studentcourses', 'session', 'courses', 'semesters'));
    }




    public function viewregistration(){
       

        //$reghistory = RegHistory::where( 'student_id',  Auth('students')->user()->id );
        $reghistory = RegHistory::where( 'student_id',  Auth('students')->user()->id )
        ->with('student', 'course')->get();

        return view('student.view_registration', compact('reghistory'));

    }
    
    
    

}
