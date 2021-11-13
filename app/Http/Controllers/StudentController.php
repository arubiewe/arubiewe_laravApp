<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ActiveCourse, Course };
use App\{GenCourse , GeneralCourse};



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
    
        return view('student.dashboard');

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
        
        $courses = $request-> course;
        //$loggedUser = Auth('students')->user()->matric_no;
        $loggedUser = Auth('students')->user()->matric_no;
        //dd($courses);
        dd($courses);


    }

    public function studentcourse(){

        $department_id = Auth('students')->user()->department_id;
        $department_minor_id = Auth('students')->user()->department_minor_id;
       
       // $courses = Course::where(['department_id' => $department_id, 'department_id'=> 5 ] )->get();//orWhere ('department_id', $department_minor_id)->get();
        
       // $courses = Course::where([['department_id', '=', 1]])->where('department_id', 5)->orWhere('department_id', $department_minor_id)->get();
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
         return View::make("student/course_registration", compact('courses'));
    } 
    
    
    

}
