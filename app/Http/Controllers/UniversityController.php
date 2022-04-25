<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\UniversityApplicant;
use Ramsey\Uuid\Uuid;

class UniversityController extends Controller
{
    //

    public function index()
    
    {
        return view('UniversityApp/Admission/lasued_apply');    
    }


    public function store(Request $request)
    
    {
        

       $genId  =   rand(1000,5000000);

       $application_no = 'LASUED/'. $genId ;

       $uuid = Uuid::uuid4();
       $university_applicants = new UniversityApplicant();
      
      
       dd($request->all());
       $university_applicants->applicant_id = $uuid;
       $university_applicants->application_no = $application_no ;
       $university_applicants->jamb_no = request('jambno');
       $university_applicants->surname = request('surname');
       $university_applicants->first_name = request('firstname');
       $university_applicants->middle_name = request('middlename');
       $university_applicants->email = request('email');
       $university_applicants->mobile_no = request('phoneno');
       $university_applicants->course = request('course');

       $university_applicants->save();

       return redirect()->back()->with('Application was successfull');


    }
}
