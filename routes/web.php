<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Course;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('student/login');
});

Route::get('/index', 'CourseController@index');




Route::get('admin_dashboard/dashboard', 'AdminController@index');

Route::get('/welcome', 'CourseController@show');
Route::get('admin_dashboard/course_reg', 'CourseController@create');
Route::post('/admin_dashboard/course_reg', 'CourseController@store');


Route::post('/upload_courses', [AdminController::class, 'import_course'])->name('import_course');


Route::get('admin_dashboard/upload_courses', 'AdminController@create');
Route::post('admin_dashboard/upload_courses', 'AdminController@store');
Route::get('admin_dashboard/upload_courses', 'AdminController@batchup');
Route::get('admin_dashboard/upload_courses', 'AdminController@getdepartmentoption');

Route::post('/upload_students', [AdminController::class, 'import_student'])->name('import_student');

//Route::get('admin_dashboard/upload_students', 'AdminController@create');
Route::get('admin_dashboard/upload_students', 'AdminController@student_batchup');
Route::get('admin_dashboard/upload_students', 'AdminController@getstudentdepartmentoption');







Route::get('/student', 'CustomAuthController@login');
//Route::get('/student/dashboard', 'CustomAuthController@login');
Route::post('student/dashboard', 'CustomAuthController@loginUser');
//Route::get('student/successlogin', 'StudentController@successlogin');
Route::get('student/hash', 'CustomAuthController@hash');


Route::get('student/dashboard', 'StudentController@dashboard');
Route::get('student/dashboard/show', 'StudentController@show');

Route::get('student/course_registration', 'StudentController@studentcourse');
Route::post('student/course_registration', 'StudentController@store');
Route::get('student/course_form', 'StudentController@studentcourseregistration');
Route::get('student/view_registration', 'StudentController@viewregistration');
//Route::get('student/show/{id}','StudentController@showreghistory')->name('student.show');
Route::get('student/registration_history/{id}/{semester}','StudentController@showreghistory')->name('student.registration_history');
Route::get('student/profile/{id}', 'StudentController@profile')->name('student.profile');
Route::patch('student/profile/{id}', 'StudentController@profileupdate');
 

//University Route 
Route::get('UniversityApp/Admission', 'UniversityController@index');
// Route::get('UniversityApp/Admission', 'UniversityController@create');
Route::post('UniversityApp/Admission/lasued_apply', 'UniversityController@store');





Route::get('hash', function(){
 dd(Hash::make("ARUBIEWE"));


});





