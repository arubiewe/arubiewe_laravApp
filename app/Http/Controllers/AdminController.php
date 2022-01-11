<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CoursesImport;
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

        $request->validate([
            'coursecode' =>'required',
            'title' => 'required',
            'isgeneral' => 'required',
            'semester' => 'required',
        ]);
       
        $selectedDept = $request->get('optiondept');
       //dd($request['multiInput']);

            foreach($request['multiInput'] as $request){  

            $upload_course = new Course();
            $upload_course->course_code = $request['coursecode'];
            $upload_course->course_title = $request['title'];
            $upload_course->department_id = $selectedDept;
            $upload_course->is_general = $request['isgeneral'];
            $upload_course->semester = $request['semester'];
             
           $upload_course->save();
           
           // return redirect()->back()->with('success','Course Successfully Added!');
       
        }

        return redirect()->back()->with('success','Course Successfully Added!');
    
    }

    public function import_course(Request $request){

        $request->validate([
            'excel_file' => 'required|mimes:xlsx',
            'optiondeptt' => 'required|int',
            ]);
        $departmentId = $request->optiondeptt;
        
        Excel::import(new CoursesImport($departmentId), $request->file('excel_file') );

        return redirect()->back()->with('success', 'Batch Courses Successfully Uploaded');

    }
   


    
    // public function import_course(Request $request){

    //     $request->validate([
    //         'excel_file' => 'required|mimes:xlsx',
    //         'optiondeptt' => 'required|int',
    //         ]);
        
    //     Excel::import(new CoursesImport, $request->file('excel_file') );

    //     return redirect()->back()->with('success', 'Batch Courses Successfully Uploaded');


    // }



}
