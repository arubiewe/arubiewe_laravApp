<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
     protected $guarded = [];


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

    public function semester(){


        return $this->belongsTo('App\Semester');

    }

    public function reghistory(){


        return $this->belongsTo('App\RegHistory', 'student_id');

    }

    public function curriculum(){


        return $this->belongsTo('App\Curriculum');

    }

    public function course(){


        return $this->belongsTo('App\Course', 'currid');

    }
    
    


}
