<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ActiveCourse, Course };
use App\{GenCourse , GeneralCourse, AcademicSession, StudentRegistration};
Use App\{RegHistory, Semester, Student, Vendor};
use DB;

//use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use App\Models\GeneralCourse;
//use View;
use Validator;
use Session;



    //public $departmentMinorId; 

class StudentController extends Controller
{

    
    
    public function index(){


        
       return view('student.login');

    }

    

    public function dashboard(){

       

        $vendors = Vendor::where('pin', Session::get('log'))->get();

        foreach($vendors as $ven){

            $ven->vendor_name;

        Session::put('ven_name', $ven->vendor_name);
        Session::get('ven_name');
        }


       // dd(Session::get('log'));
        
        //dd(Session::get('ven_name'));
        //dd($userpin);
        //dd($dept);
        //$dashbaordSession = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
        $dashbaordSession = AcademicSession::where('id', 1 )->get();
        
       $sessionDashboard = AcademicSession::where('id', 1 )->value('session');
      
       //$userpin = $vendors;
       //dd($vendors);
       //dd($userpin);
       //dd($this->userpin);
      
       //dd($dashbaordSession, $sessionDashboard);
        //return View::make("student/dashboard", compact('dashbaordSession'));
        return view('student/dashboard', compact('dashbaordSession', 'sessionDashboard', 'vendors'));

       // return view('student.dashboard');

}

public function profile($id){

    $profiles = Student::find($id);
    //dd($profiles);
   
    return view('student.profile' , compact('profiles', 'id'));
    //return view('student.registration_history', compact('studentcourses', 'session', 'courses', 'semesters'));

    // return view('student.profile_update');

 }

 public function update($id){

    
    $student = Student::find($id);
    //dd($profiles);
   
    return view('student.profile' , compact('profiles', 'id'));
    //return view('student.registration_history', compact('studentcourses', 'session', 'courses', 'semesters'));

    // return view('student.profile_update');

 }

 public function profileupdate(Request $request, $id){
    
    //$input = $request->all();
    $input = $request->get('image');
    if ($request->get('image') == null){ 

        $input['image_path'] = 'AVATAR.JPG';
    }
    //dd($request->get('image'));
    $this->validate($request, [

        'surname' => 'required',
        'other_names'  => 'required',
        'matric_no'  => 'required',
        'school'  => 'required',
        'combination'  => 'required',
        'level'  => 'required',
        'gender'  => 'required',
        'dob'  => 'required',
        'email'  => 'required',
        'phone'  => 'required',
        'address'  => 'required',
        'nationality'  => 'required',
        'state'  => 'required',
        'lga'  => 'required',
        'bloodgrp'  => 'required',
        'kinname'  => 'required',
        'kin_no'  => 'required',
        // 'image'  => 'required|image|mimes:jpg,JPG,jpeg,PNG,png|max:2048'
    ]);
    
    
   

    
    
   
    if ($request->hasFile('image')){

        $destination_path = 'public/images/students';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($destination_path,$image_name);
        $input['image_path'] = $image_name;
    }

    
    //dd($input);
   
    $student = Student::find($id);
    $student->surname = $request->get('surname');
    $student->other_names = $request->get('other_names');
    $student->matric_no = $request->get('matric_no');
    $student->school = $request->get('school');
    $student->combination = $request->get('combination');
    $student->current_level = $request->get('level');
    $student->gender = $request->get('gender');
    $student->dob = $request->get('dob');
    $student->email = $request->get('email');
    $student->phone = $request->get('phone');
    $student->address = $request->get('address');
    $student->nationality = $request->get('nationality');
    $student->state = $request->get('state');
    $student->lga = $request->get('lga');
    $student->blood_group = $request->get('bloodgrp');
    $student->kin_name = $request->get('kinname');
    $student->kin_phone = $request->get('kin_no');
    $student->image_path = $input['image_path'];
    
    $student->save();
    
    //dd($request->all());
    //return redirect()->back()->with('message2', 'Course Registration is Successful');
    return redirect('student/dashboard')->with('message2', 'Your Profile is Now Updated !');
 }




    

    
    public function show(){

       $uss = Auth('students')->user()->department_id;

       dd($uss);

    
    }

    public function create(){
    


        return view('student.course_registration');


    }


    public function store(Request $request){  

        $vendors = Vendor::where('pin', Session::get('log'))->get();
        
        foreach($vendors as $venn){

            $venn->vendor_name;

        Session::put('ven_name', $venn->vendor_name);
        Session::get('ven_name');
        }

        $regBy =  Session::get('ven_name');

        //dd($regBy);
        //dd(Session::get('ven_name'));
      
        $loggedUser = Auth('students')->user()->id;
        $loggedUserMatric = Auth('students')->user()->matric_no;
        $user = StudentRegistration::where('student_id', '=', $loggedUser)->first();
        
        $semester = Semester::where('id', 1)->value('semester_name');
        $semesterId = Semester::where('id', 1 )->value('id');
     //dd($semesterId);
      
        $choose_course = $request->input('course');
        if ($user === null) {
        foreach($choose_course as $choose){
        
        $session = AcademicSession::where('id', 1)->value('session');
        
        
        $registrations = new StudentRegistration();
        $data = ['student_id' => $loggedUser, 'course_id' => $choose, 'session' => $session, 'semester_id' => $semesterId];
        $registrations->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'course_id' => $choose, 'session' => $session, 'semester_id' => $semesterId, 'reg_by' => $regBy]
        );
        
        $reg_history = new RegHistory();
        $data = ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric];
        $reg_history->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric, 'session' => $session, 'semester' => $semester, 'semester_id' => $semesterId]
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
       //$session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
       $session = AcademicSession::where('id', 1 );
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
         //return View::make("student/course_registration", compact('courses', 'session'));
         return view('student/course_registration', compact('courses', 'session'));
         //return View::make("student/course_registration", compact('session'));
    }
    
    

    public function studentcourseregistration(){

        //$student_id = Auth('students')->user()->id;

        $imageOwner = Student::where('id', Auth('students')->user()->id )->get();
        //dd($imageOwner);
        //$session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
        //dd($session);
       $session = AcademicSession::where('id', 1 );
       
       $registration = StudentRegistration::where( 'student_id',  Auth('students')->user()->id )
                                            ->with('student', 'course')->get();

       // $reg = StudentRegistration::where('student_id', 2)->with('student', 'course')->get();
                       
        //dd($registration);

       // return View::make("student/course_form", compact('registration', 'session'));
        return view('student/course_form', compact('registration', 'session'));

    }

    public function showreghistory($id)
    {
        //---- $session = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
        //$session = AcademicSession::where('id', 1 )->value('session');
        $session = AcademicSession::where('id', 1 );
       
        $studentcourses = RegHistory::with('course', 'student' )->findOrFail($id);
        $semesters = Semester::with('reghistory', 'student')->findOrFail($id);

        //dd($studentcourses->session);
       
       // $courses = StudentRegistration::where('student_id', $studentcourses->student_id)->where('session', $studentcourses->session)->get();
       $courses = StudentRegistration::where('student_id', Auth('students')->user()->id )->where('session', $studentcourses->session)->orWhere('semester_id', $semesters->id )->get();
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
