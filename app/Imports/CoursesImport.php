<?php

namespace App\Imports;

use App\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoursesImport implements ToModel, WithHeadingRow
{
    public $departmentId; 

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId; 
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {

        
       
        // return new Course([
          
        //    'course_code'   => $row['course_code'],
        //    'course_title'  => $row['course_title'],
        //    'department_id' => $row['department_id'],
        //    'is_general'    => $row['isgeneral'], 
        //    'semester'      => $row['semester'],   
        // ]);

        

        public function model(array $row)
        {

            //dd($this->departmentId);
            
            return new Course([
               
               'course_code'   => $row['course_code'],
               'course_title'  => $row['course_title'],
               'department_id' => (int) $this->departmentId,
               'is_general'    => $row['isgeneral'], 
               'semester'      => $row['semester'],  
            ]);
           
    }
}

//}
