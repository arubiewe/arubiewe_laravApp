<?php

namespace App;
use Illuminate\Foundation\Auth\Student as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    
    public function course()

    {
        return $this->hasMany('App\Course', 'department_id');

        
    }
    
    
        
    
   
   
}
