<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
    public function course()

    {
        return $this->hasMany('App\Course', 'department_id');
    }

    public function student()

    {
        return $this->hasMany('App\Student', 'department_id');
    }

    public function generalcourse()

    {
        return $this->hasMany('App\GeneralCourse', 'department_id');
    }
   

}
