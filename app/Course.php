<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function department()

    {
       
        return $this->belongsTo('App\Department', 'department_id');
        
    }

    public function students()

    {
       
        return $this->belongsToMany('App\Student',  'department_id', 'department_minor_id');
        
    }

    public function studentregistration()
    {
        return $this->belongsTo('App\StudentRegistration', 'student_id', 'course_id');
    }

    
    


}
