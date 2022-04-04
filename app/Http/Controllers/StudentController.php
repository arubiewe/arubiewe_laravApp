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

        $dashbaordSession = AcademicSession::where('id', 1 )->get();        
        $sessionDashboard = AcademicSession::where('id', 1 )->value('session');
      
       return view('student/dashboard', compact('dashbaordSession', 'sessionDashboard', 'vendors'));

    }


    public function show(){

       $uss = Auth('students')->user()->department_id;

       dd($uss);

    
    }

    public function create(){
    
        return view('student.course_registration');
    }


    public function studentcourse(){

        $department_id = Auth('students')->user()->department_id;
        $department_minor_id = Auth('students')->user()->department_minor_id;
        

        $session = AcademicSession::where('status', 1)->first();
        $semester_status = Semester::where('status', 1)->first();
    

        $courses = Course::where('semester_id', $semester_status->id)
                                ->whereIn('department_id', [$department_id, $department_minor_id, 5])
                                ->orderBy('course_code', 'ASC')
                                ->get();

                                //dd($courses);

         //dd($semester_status->id);

    //   $general_courses = Course::where('semester_id',  $semester_status->id )    
    //             ->where('department_id', 5)                           
    //             ->orderBy('course_code', 'ASC')
    //             ->get()->toArray();
    //     $courses1 = Course::where('semester_id',  $semester_status->id )
    //             ->where('department_id', '=', $department_id)                   
    //             ->orderBy('course_code', 'ASC')
    //             ->get()->toArray();
    //     $courses2 = Course::where('semester_id',  $semester_status->id )
    //             ->where('department_id', '=', $department_minor_id)
    //             ->orderBy('course_code', 'ASC')
    //             ->get()->toArray();
        // $courses = array_merge($general_courses, $courses1, $courses2);
       // dd(count($courses));
    
    
        // $courses = Course::orWhere('semester_id', '=', $semester_status->id )->where('department_id', '=', 5)
    // ->orWhere('department_id', $department_id)
    // ->orWhere('department_id', $department_minor_id)->orderBy('course_code', 'ASC')
    // ->get();
       
             

        return view('student/course_registration', compact('courses',  'session'));
         //return View::make("student/course_registration", compact('session'));
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
        
      
        $choose_course = $request->input('course');
       // $current_session = AcademicSession::where('status', 1  )->value('session');
        $current_session = AcademicSession::where('status', 1)->first();
      
        $semester = Semester::where('status', 1)->first();
        //$semesterStatus = Semester::where('status', 1  )->value('status');
        $semesterStatus = Semester::where('status', 1)->first();
        
        $count =  StudentRegistration::where('session',  $current_session->session )
                ->where('semester_id', $semesterStatus->status )
                ->where('student_id', Auth('students')->user()->id )
                ->exists();
        
     if ($count === false || $current_session->session === '2020/2021' || $semesterStatus === 'First'  ){

        foreach($choose_course as $choose){
        
           
       // $session = AcademicSession::where('status', 1  )->value('status');
        $session = AcademicSession::where('status', 1)->first();
           

        $registrations = new StudentRegistration();
        $data = ['student_id' => $loggedUser, 'course_id' => $choose, 'session' => $current_session->session, 'semester_id' => $semesterStatus->id];
        $registrations->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'course_id' => $choose, 'session' => $current_session->session, 'semester_id' => $semesterStatus->id, 'reg_by' => $regBy]
        );
    }

    //$semester = Semester::where('status', 1 )->value('semester_name');
        $semester = Semester::where('status', 1)->first();

        //dd($semester);
        $reg_history = new RegHistory();
        $data = ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric,'session' => $current_session->session, 'semester' => $semester->semester_name];
        $reg_history->updateOrCreate(
            $data, 
            ['student_id' => $loggedUser, 'matric_no' => $loggedUserMatric, 'session' => $current_session->session, 'semester' => $semester->semester_name, 'semester_id' => $semesterStatus->id]
        );


    return redirect()->back()->with('success2', 'You have successfully Registered Your Courses for  ' . $current_session->session . ' Academic Session!  Please Ensure you print your course form');
            
}
   
        else { 
            
            //$session = AcademicSession::where('id', 1)->value('session');
            $session = AcademicSession::where('status', 1)->first();
            
           // return 'You have registered already for the '. $session . ' Academic Session' ;
            return redirect()->back()->with('errormsg', 'You have registered already for the ' . $session->session .  ' Academic Session' );  
        
        }


    }

    
    

    public function studentcourseregistration(){

        $imageOwner = Student::where('id', Auth('students')->user()->id )->get();
        $session = AcademicSession::where('status', 1)->first();
     //$currentSemesterStatus = Semester::where('status', 1)->value('status');
        $currentSemesterStatus = Semester::where('status', 1)->first();
        $registration = StudentRegistration::where( 'student_id',  Auth('students')->user()->id )
                        ->where('semester_id', $currentSemesterStatus->status )
                        ->with('student', 'course')->get();
        return view('student/course_form', compact('registration', 'session'));

    }

    public function showreghistory($id)
    {
        
        $session = AcademicSession::where('status', 1)->first();
        $studentcourses = RegHistory::with('course', 'student' )->findOrFail($id);
        $semesters = Semester::with('reghistory', 'student')->findOrFail($id);
       // $courses = StudentRegistration::where('student_id', $studentcourses->student_id)->where('session', $studentcourses->session)->get();
       $courses = StudentRegistration::where('student_id', Auth('students')->user()->id )->where('session', $studentcourses->session)->Where('semester_id', $semesters->id )->get();
       //dd($courses);
        return view('student.registration_history', compact('studentcourses', 'session', 'courses', 'semesters'));
    }




    public function viewregistration(){
        //$reghistory = RegHistory::where( 'student_id',  Auth('students')->user()->id );
        $reghistory = RegHistory::where( 'student_id',  Auth('students')->user()->id )
                    ->with('student', 'course')->get();

        return view('student.view_registration', compact('reghistory'));

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
    
            $input['image_path'] = 'AVATAR.jpg';
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
    
    
    
    

}
