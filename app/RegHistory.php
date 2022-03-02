<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegHistory extends Model
{
    protected $fillable  = ['student_id', 'matric_no', 'session', 'semester', 'semester_id'];

    public function student()

    {
       
        return $this->belongsTo('App\Student');
        
    }

    public  function studentregistration(){

        return $this->hasMany('App\StudentRegistration', 'id', 'student_id'); 



    }

    public function reghistory(){


        return $this->hasMany('App\RegHistory');

    }

    public function course(){


        return $this->belongsTo('App\Course');

    }


    public function semester(){


        return $this->belongsTo('App\Semester');

    }



}
