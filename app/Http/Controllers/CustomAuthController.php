<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use Validator;


class CustomAuthController extends Controller
{
    public function login(){

        return view ("student.login");

    }

    public function loginUser(Request $request){

        //    return view ("student.login");
        $request->validate([

            'name' =>'required',
            'password' => 'required',
        ]);


        $user_data = array(

            'name'  => $request->get('name'),
            'password'  => $request->get('password')

        );
        
        //dd($user_data);

        if(Auth::guard('students')->attempt($user_data))
        {
            //return redirect ('student/dashboard');
            return view ('student/dashboard');


        }
        else {

            return back()->with('error', 'Invalid Login Credentials ');

        }

    


    }

    

    
}   
