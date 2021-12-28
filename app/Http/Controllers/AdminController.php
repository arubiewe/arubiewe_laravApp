<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    
    {

        return view('admin_dashboard.dashboard');


    }

    public function create(){

         return view('admin_dashboard.upload_courses');

    }
    public function store(Request $request){

        // $request->validate([
        //     'addMoreInputFields.*.course_code' => 'required'
        // ]);
     
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     Student::create($value);
        // }
     
        // return back()->with('success', 'New subject has been added.');
    
    }



}
