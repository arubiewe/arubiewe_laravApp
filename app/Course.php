<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function department()

    {
       
        return $this->belongsTo('App\Department', 'department_id');
        
    }

    public function student()

    {
       
        return $this->belongsToMany('App\Student',  'department_id', 'department_minor_id');
        
    }

    
    


}
