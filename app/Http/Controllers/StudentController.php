<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ActiveCourse, Course };
use App\{GenCourse , GeneralCourse, AcademicSession, StudentRegistration};
//Use App\StudentRegistration;
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

        //$user = Auth::user();
        // $user = Auth::guard('students');
        

    //     $user_idz = Auth::guard('students');
           
    // dd($user_idz);
        //$studentMajorDept = Student::where('matric_no', )->get();
        //$studentMinorDept = Student::all();

        //dd($studentMajorDept);


        //$courses = Course::where('department_id', 1 )->orWhere ('department_id', 2)->get();
       // dd($courses);

    }

    public function create(){
    


        return view('student.course_registration');


    }


    public function store(Request $request){
        
       
       // $courses = $request->input('course');
    //    $selectedcourse = array();

    //    foreach($courses as $course){
    //       $selectedcourse[] = $course;
    //    }
        //$courses = implode(",", $request->get('course'));
       
        //dd($courses);
        $loggedUser = Auth('students')->user()->id;
        //$courses = $request->course;
        //$session = StudentSession::where('session', '=' , '20' )->get());
        //$session = AcademicSession::('id', 1)->get(); 
       
        //dd($session);
        // $session = AcademicSession::select('session')->where('id', 1)->session->get();
        // $session = AcademicSession::select('session')->where('id', 1)->get();
        $choose_course = $request->input('course');
        foreach($choose_course as $choose){
        
        //dd($choose_course);
            //Student::is_present_today($sp)



      
        $session = AcademicSession::where('id', 1)->value('session');
        //dd($session);
        //$loggedUser = Auth('students')->user()->matric_no;
        $registrations = new StudentRegistration();
        $registrations->student_id = ($loggedUser);
        $registrations->course_id = ($choose);
        //$registrations->course_id =json_encode($selectedcourse);
        
        $registrations->session = ($session);

        $registrations->save();

        //return redirect('/welcome');
        //dd($courses);
        //dd($session);
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
       $registration = StudentRegistration::where( 'student_id',  Auth('students')->user()->id )->with('student', 'course')->get();

       // $reg = StudentRegistration::where('student_id', 2)->with('student', 'course')->get();
                       
        //dd($registration);

        return View::make("student/course_form", compact('registration', 'session'));






    }
    
    
    

}
