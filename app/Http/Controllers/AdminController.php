<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Use App\Department;
use App\{Department};
Use App\Course;
use View;

class AdminController extends Controller
{
    //

    public function index()
    
    {

        return view('admin_dashboard.dashboard');


    }

    public function create(){

    return view('admin_dashboard.upload_courses');

    }

    public function getdepartmentoption(){

        $department = Department::all();
       //dd($department);
        return View::make('admin_dashboard.upload_courses', compact('department'));




    }
    public function store(Request $request){
       
        $selectedDept = $request->get('optiondept');
        //dd($selectedDept);
        //dd($request);

        // foreach ($request->all() as $request){
            foreach ($request['multiInput'] as $request){

            //dd($request['coursecode']);
            //dd($request->all());   
            //$saveModel = new Model();
            $upload_course = new Course();
            $upload_course->course_code = $request['coursecode'];
            $upload_course->course_title = $request['title'];
            $upload_course->department_id = $selectedDept;
            $upload_course->is_general = $request['isgeneral'];
            $upload_course->semester = $request['semester'];
            //dd($upload_course);
            $upload_course->save();
            
            return redirect()->back()->with('success','Course Successfully Added!');
        }

        //dd(34);

        // $request->validate([
        //     'addMoreInputFields.*.course_code' => 'required'
        // ]);
     
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     Student::create($value);
        // }
     
        // return back()->with('success', 'New subject has been added.');
    
    }

    // public function saveData(Request  $request){

    //     foreach ($request->all() as $request){
    //         //$saveModel = new Model();
    //         $upload_course = new Course();
    //         $upload_course->course_code = $request->value;
    //         $upload_course->course_title = $request->value;
    //         $upload_course->department_id = $request->value;
    //         $upload_course->is_general = $request->value;
    //         $upload_course->semester = $request->value;
    //         $upload_course->save();
    //     }


    // }



}
