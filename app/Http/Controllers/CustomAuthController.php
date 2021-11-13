<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use Validator;
use Session;
use Hash;
//use Auth;




class CustomAuthController extends Controller
{
    public function login(){

        return view ("student.login");

    }

    public function loginUser(Request $request){

        //    return view ("student.login");
        $request->validate([

            'matricno' =>'required',
            'password' => 'required',
        ]);


        $user_data = array(

            'matric_no'  => $request->get('matricno'),
            'password'  => $request->get('password'),     
        );
        
        if(Auth::guard('students')->attempt($user_data))
        {
            //return redirect ('student/dashboard');
            //$user_id= Auth::guard('students');
           
            //dd($user_id);
            $user = Auth::guard('students');
            if (Auth::guard('students')->check()) {
 
                // Thecheck user is logged in...
                //dd($user);    
            }
           
            return view ('student/dashboard');
            
        }
        else {

            return back()->with('error', 'Invalid Login Credentials ');

        }

    }


    public function show(){

    }

    public function hash(){
    $sss = Hash::make('OGUNLEYE');

        dd($sss);
    }
   
}   
