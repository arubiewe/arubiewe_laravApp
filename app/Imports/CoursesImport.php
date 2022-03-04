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
   
        

        public function model(array $row)
        {

            //dd($this->departmentId);
           // dd($row['unit']);
            return new Course([

               'course_code'   => $row['course_code'],
               'course_title'  => $row['course_title'],
               'course_unit'  => $row['course_unit'],
               'course_status'  => $row['course_status'],
               'semester'  => $row['semester'],
               'course_level'  => $row['course_level'],
               'department_id' => (int) $this->departmentId,
               'is_general'    => $row['isgeneral'],
               'is_oldcurriculum'    => $row['is_oldcurriculum'],
               'currid'    => $row['currid'],  
              
               
               

            ]);
           
    }
}


