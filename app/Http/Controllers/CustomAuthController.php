<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Student;
use App\{ AcademicSession};
use Validator;
use Session;
use DB;
use Hash;
use View;
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
            'password'  => strtoupper($request->get('password')),     
        );
       // dd($user_data);
        
        
        if(Auth::guard('students')->attempt($user_data))
        {
            //return redirect ('student/dashboard');
            //$user_id= Auth::guard('students');
           
           
            //dd($user_id);
            $user = Auth::guard('students');
            $dashbaordSession = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 

            if (Auth::guard('students')->check()) {


               
 
                // Thecheck user is logged in...
                //dd($user);    
            }
           
            //return view ('student/dashboard');
            
            return View::make("student/dashboard", compact('dashbaordSession'));
            
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
