<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Student;
//use App\Models\Vendor;
use App\{AcademicSession, Vendor};
use Validator;
use Session;
use DB;
use Hash;
use View;
//use Auth;




class CustomAuthController extends Controller
{
    public $pin;
    public function login(){

        return view ("student.login");

    }

    public function loginUser(Request $request){

        //    return view ("student.login");
        $request->validate([

            'matricno' =>'required',
            'password' => 'required',
            'pin' => 'required',
        ]);
        
        //dd($request->get('pin'));
        
        $user_data = array(
            'matric_no'  => $request->get('matricno'),
            'password'  => strtoupper($request->get('password')),
        );

        $user_data2 = array(

            'pin'  => $request->get('pin'),    
        );

        $vendors = Vendor::where('pin', $user_data2 )->value('pin');
        
        $dept  = Vendor::where('pin', $user_data2 )->value('pin');

        //Session::set('log', $dept);
        //dd(config('global.logged'));
        Session::put('log', $dept);
        Session::get('log');
        //dd(Session::get('log'));
       
        if ($vendors != $request->get('pin')){


            return back()->with('error', 'Invalid Pin Credentials ');


        }
        else{

       //dd($user_data2);
               
         if(Auth::guard('students')->attempt($user_data) ) 
        {
            //return redirect ('student/dashboard');
            $user_id= Auth::guard('students');
            $ven_id= Auth::guard('vendors');


            $user = Auth::guard('students');
            //$vendors = Auth::guard('vendors');
            //$profiles = Student::find($user);
            //$userpin = Auth::id();
            //dd($vendors);
           
            $dashbaordSession = DB::SELECT("SELECT * FROM academic_sessions WHERE id = 1"); 
            $vendors = Vendor::where('pin', $request->get('pin'))->get();
            //$dep = $request->pin;
            //$userpin = $vendors;
            ///dd($vendors);

            if (Auth::guard('students')->check()) {
                // Thecheck user is logged in...
               // dd(Auth::guard('students'));  
                    return View::make("student/dashboard", compact('dashbaordSession', 'vendors'));  
            }
           
            //return view ('student/dashboard');
        
        }
        else {

            return back()->with('error', 'Invalid Login Credentials ');

        }
    }

}


    public function show(){

    }

    public function hash(){
    $sss = Hash::make('OGUNLEYE');

        dd($sss);
    }
   
}   
