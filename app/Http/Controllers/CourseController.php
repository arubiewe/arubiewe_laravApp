<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\ActiveCourse;
use Ramsey\Uuid\Uuid;



class CourseController extends Controller
{
    //

    public function index(){

        return view('index');

      
    }



    public function show(){

        $courses = ActiveCourse::all();
        
        //dd($courses);
        //dd($randomId);

        return view('welcome', [
             'courses' => $courses,

        ]);

        
    }


    public function create(){
    


        return view('admin_dashboard.course_reg');


    }


    public function store(){
       
       $course = new ActiveCourse();

       //$genId  =   rand(10,50);
       $uuid = Uuid::uuid4();
      // dd($uuid);
       $course->course_id =  ($uuid);
       $course->course_code = request('coursecode');
       $course->course_title = request('title');
       $course->course_unit = request('unit');
       $course->status = request('status');
       $course->semester = request('semester');

       //dd($course);
       //error_log($course);
        $course->save();

       return redirect('/welcome');


    }


}
