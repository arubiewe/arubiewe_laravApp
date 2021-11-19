<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    //

public function course(){


    return $this->belongsTo('App\Course');



}


public function student(){


    return $this->belongsTo('App\Student');



}






}
