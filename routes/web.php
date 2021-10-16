<?php

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
    return view('index');
});

Route::get('/index', 'CourseController@index');

//  Route::get('/welcome', 'CourseController@index');


Route::get('admin_dashboard/dashboard', 'AdminController@index');

Route::get('/welcome', 'CourseController@show');

Route::get('admin_dashboard/course_reg', 'CourseController@create');
Route::post('/admin_dashboard/course_reg', 'CourseController@store');
Route::get('/student', 'StudentController@index');
Route::post('/student/checklogin', 'StudentController@checklogin');
Route::get('student/successlogin', 'StudentController@successlogin');
Route::get('/student/logout', 'StudentController@logout');


// Route::get('admin_dashboard/dashboard', function () {
      
//     return view('admin_dashboard.dashboard');
// });

// Route::get('admin_dashboard/course_reg', function () {
      
//     return view('admin_dashboard.course_reg');
// });



