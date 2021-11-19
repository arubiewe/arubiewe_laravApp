<?php

namespace App;
//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class User extends Authenticatable

//use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable 
{

    
    public function course()

    {
        return $this->hasMany('App\Course', 'department_id');

        
    }


    public function generalcourse()

    {
        return $this->hasMany('App\GeneralCourse', 'department_id');

        
    }

    
    public function studentregistration()

    {
        return $this->hasMany('App\StudentRegistration', 'student_id', 'course_id');

        
    }
        
    
   
   
}
