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
Route::auth();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home.home');
});

Route::get('/examination', 'DoctorController@index');
Route::get('/clinic/home',['as' => 'clinic.home', 'uses' =>'ClinicController@home']);
Route::get('/doctor/home',['as' => 'doctor.home', 'uses' =>'DoctorController@home']);
Route::get('/clinic/staff/create'  , ['as' => 'clinic.addstaff', 'uses' => 'StaffController@create']);
Route::post('/clinic/staff'  , ['as' => 'clinic.staff', 'uses' => 'StaffController@store']);
Route::get('/clinic/doctors'  , ['as' => 'clinic.doctors', 'uses' => 'ClinicController@doctors']);
Route::get('/clinic/staff'  , ['as' => 'clinic.staff', 'uses' => 'ClinicController@staff']);
Route::get('/clinic/doctors/{doctor}/profile/'  , ['as' => 'clinic.profile', 'uses' => 'DoctorController@profile']);


Route::get('/clinic/information/edit'  , ['as' => 'clinic.information.edit', 'uses' => 'ClinicController@edit']);
Route::patch('/clinic/information'  , ['as' => 'clinic.information.update', 'uses' => 'ClinicController@update']);

Route::get('/register/home',['as' => 'register.home', 'uses' =>'RegisterController@home']);
Route::get('/register/create',['as' => 'register.create', 'uses' =>'RegisterController@create']);
Route::get('/register/edit',['as' => 'register.edit', 'uses' =>'RegisterController@edit']);
Route::post('/register'      ,['as' => 'register.store', 'uses' =>'RegisterController@store']);


Route::get('/medicine',['as' => 'medicine.index', 'uses' =>  'MedicineController@index']);
Route::post('/medicine/store', ['as' => 'medicine.store', 'uses' => 'MedicineController@store']);
Route::delete('/medicine/{medicine}', 'MedicineController@destroy');
