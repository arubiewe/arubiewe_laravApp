<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    //
protected $fillable  = ['student_id', 'course_id', 'session', 'semester_id', 'currid_id', 'reg_by'];


public function course(){

    return $this->belongsTo('App\Course');



}


public function student(){


    return $this->belongsTo('App\Student');



}

        public function reghistory(){


            return $this->belongsTo('App\RegHistory');

        }

        public function semester(){


            return $this->belongsTo('App\Semester');

        }


        public function curriculum(){


            return $this->belongsTo('App\Curriculum');

        }


        



}
