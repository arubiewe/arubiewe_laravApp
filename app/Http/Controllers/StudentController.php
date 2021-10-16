<?php

namespace App\Http\Controllers;
use App\{ActiveCourse, Course};
use App\Student;
use Illuminate\Http\Request;
use Validator;
use Auth;

class StudentController extends Controller
{
    //
    public function index(){

        return view('student.login');

    }

    function checklogin(Request $request)
    {
        // $this->validate($request, [


        //     'matricno' => 'required|matricno',
        //     'surname' => 'required|surname|min:2'

        // ]);

        $user_data = array(

            'matric_no'  => $request->get('matricno'),
            'surname'  => $request->get('surname')

        );

        if(Auth::attempt($user_data))
        {
            return redirect('student/successlogin');


        }

        else {

            return back()->with('error', 'Wrong Login Details ');

        }


    }



    function successlogin()
    
    {

        return view ('student.dashboard');


    }

    function logout()
    
    {

       Auth::logout();
       return redirect ('student');


    }


    public function show(){


        $courses = Course::where('department_id', 1 )->orWhere ('department_id', 2)->get();
        dd($courses);

    }
}
