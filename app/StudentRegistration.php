<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    //
protected $fillable  = ['student_id', 'course_id', 'session'];

public function course(){


    return $this->belongsTo('App\Course');



}


public function student(){


    return $this->belongsTo('App\Student');



}






}
