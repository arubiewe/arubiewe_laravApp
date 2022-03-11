<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public $departmentId;
    public $departmentMinorId; 
    

    public function __construct($departmentMajorId, $departmentMinorId )
    {
        $this->departmentId = $departmentMajorId; 
        $this->departmentMinorId = $departmentMinorId; 
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        //dd($this->departmentMinorId);

        return new Student([
            'surname'   => $row['surname'],
            'other_names'  => $row['other_names'],
            'matric_no'  => $row['matric_no'],
            'school'  => $row['school'],
            'combination'  => $row['combination'],
            'current_level'  => $row['level'],
            'image_path'  => $row['image_path'],
            'department_id' => (int) $this->departmentId,
            'department_minor_id' => (int) $this->departmentMinorId,
            'password' => Hash::make($row['surname']),
            
        ]);
    }
}
