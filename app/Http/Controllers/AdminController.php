<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CoursesImport;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;


//Use App\Department;
use App\{Department};
Use App\Course;
Use App\Student;
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

    public function getstudentdepartmentoption(){
        
        $optiondepttmajor = Department::all();
        $optiondepttminor = Department::all();
        //dd($department);
        return View::make('admin_dashboard.upload_students', compact('optiondepttmajor', 'optiondepttminor'));
        
    }


    
    public function store(Request $request){
        
        $selectedDept = $request->get('optiondept');
            
            //$selectedCurriculum = $request->get('multiInput[0][isoldcurriculum]');
            //dd($selectedCurriculum);
            //dd($request['multiInput']);

            
            foreach($request['multiInput'] as $data){ 
                
              //dd($request['multiInput']);
            //dd($data['isoldcurriculum']);
                
                $upload_course = new Course();
                $upload_course->course_code = $data['coursecode'];
                $upload_course->course_title = $data['title'];
                $upload_course->course_unit = $data['unit'];
                $upload_course->course_status = $data['status'];
                $upload_course->semester = $data['semester'];
                $upload_course->department_id = $selectedDept;
                $upload_course->is_general = $data['isgeneral'];
                
                $upload_course->is_oldcurriculum =   "old" ??$data['isoldcurriculum'];
               
              
                $upload_course->currid = $data['isoldcurrid'];
                $upload_course->course_level = $data['level'];
               
                
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


            public function import_student(Request $request) 
            {

                $request->validate([
                    'excel_file' => 'required|mimes:xlsx',
                    'optiondepttmajor' => 'required|int',
                    'optiondepttminor' => 'required|int',
                ]);
                $departmentId = $request->optiondepttmajor;
                $departmentMinorId = $request->optiondepttminor;

                Excel::import(new StudentsImport($departmentId, $departmentMinorId), $request->file('excel_file') );
                
                return redirect()->back()->with('success', 'Student Batch  Successfully Uploaded');
            }
        
        
        
        
    }
    