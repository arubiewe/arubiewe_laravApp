<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function studentregistration(){

        return $this->hasMany('App\StudentRegistration');




    }


    public function course(){

        return $this->hasMany('App\Course');




    }

    public function student(){

        return $this->belongsTo('App\Student');




    }

    public function reghistory(){

        return $this->hasMany('App\RegHistory');




    }





}
