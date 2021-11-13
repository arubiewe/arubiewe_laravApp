<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCourse extends Model
{
    //


    public function student()

    {
       
        return $this->belongsToMany('App\Student',  'department_id', 'department_minor_id');
        
    }

}
