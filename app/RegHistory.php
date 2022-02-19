<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegHistory extends Model
{
    protected $fillable  = ['student_id', 'matric_no', 'session', 'semester'];

    public function student()

    {
       
        return $this->belongsTo('App\Student');
        
    }
}
