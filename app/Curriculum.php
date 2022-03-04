<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    public  function course(){

        return $this->hasMany('App\Course', 'id', 'currid'); 



    }
}
