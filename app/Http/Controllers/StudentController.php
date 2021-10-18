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

    

    
    public function show(){


        $courses = Course::where('department_id', 1 )->orWhere ('department_id', 2)->get();
        dd($courses);

    }
}
