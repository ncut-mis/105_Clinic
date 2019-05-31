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
Route::get('/patient/{patient}/diagnosis/create'  , ['as' => 'doctor.diagnosis', 'uses' => 'DiagnosisController@create']);
Route::post('/patient/{patient}/symptom/store'  , ['as' => 'patient.diagnosis.store', 'uses' => 'DiagnosisController@store']);
Route::get('/patient/diagnosis/edit'  , ['as' => 'patient.diagnosis.edit2', 'uses' => 'DiagnosisController@edit2']);
Route::get('/patient/{patient}/diagnosis/edit2'  , ['as' => 'patient.diagnosis.edit2', 'uses' => 'DiagnosisController@edit2']);
Route::patch('/patient/{patient}/diagnosis',    ['as' => 'patient.diagnosis.update', 'uses' => 'DiagnosisController@update']);
Route::post('/patient/{patient}/diagnosis/{diagnosis}/prescription/store'  , ['as' => 'diagnosis.prescription.store', 'uses' => 'PrescriptionController@store']);
Route::delete('/patient/{patient}/prescription/{prescription}/destroy'  , ['as' => 'diagnosis.prescription.destroy', 'uses' => 'PrescriptionController@destroy']);
Route::get('/patient/{patient}/diagnosis'  , ['as' => 'doctor.diagnosis.continue', 'uses' => 'DiagnosisController@continue']);
Route::patch('/patient/{patient}/diagnosis',    ['as' => 'search.diagnosis.renew', 'uses' => 'DiagnosisController@renew']);

Route::get('/register/patient/search'  , ['as' => 'register.patient.search', 'uses' => 'RegisterController@search']);
Route::get('/register/{register}/patient/{patient}/search/diagnosis'  , ['as' => 'search.diagnosis', 'uses' => 'DiagnosisController@show']);
Route::post('/patient/{patient}/symptom/store'  , ['as' => 'search.diagnosis.post', 'uses' => 'DiagnosisController@post']);
Route::get('/patient/{patient}/diagnosis/edit2'  , ['as' => 'search.diagnosis.compile', 'uses' => 'DiagnosisController@compile']);

Route::get('/clinic/information/edit'  , ['as' => 'clinic.information.edit', 'uses' => 'ClinicController@edit']);
Route::patch('/clinic/information'  , ['as' => 'clinic.information.update', 'uses' => 'ClinicController@update']);

//掛號相關路由..................................................................................
//今日掛號名單&今日已預約名單view；取消掛號、今日預約轉為掛號
Route::get('/register/index',['as' => 'register.index', 'uses' =>'RegisterController@index']);
Route::delete('/register/index/{register}',['as' => 'register.index.destroy', 'uses' =>'RegisterController@destroy']);
Route::patch('/register/index/{section}',['as' => 'register.index.add_register', 'uses' =>'RegisterController@add_register']);
//搜尋會員view(keyword)(掛號用)
Route::get('/register/search',['as' => 'register.search', 'uses' =>'RegisterController@member_search']);
//掛號操作view(選擇醫生、時段)、儲存掛號
Route::get('/register/create',['as' => 'register.create', 'uses' =>'RegisterController@create']);
Route::post('/register/create/{section}',['as' => 'register.store', 'uses' =>'RegisterController@store']);

//預約相關路由.....................................................................................
//搜尋會員view(keyword)(預約用)
Route::get('/register/reservation',['as' => 'register.reservation', 'uses' =>'RegisterController@member_reservation']);
//預約操作view(選擇日期、醫生、時段)；儲存預約
Route::get('/register/create_reservation',['as' => 'register.create_reservation', 'uses' =>'RegisterController@create_reservation']);
Route::post('/register/create_reservation',['as' => 'register.reservation_store', 'uses' =>'RegisterController@reservation_store']);

//過號相關路由......................................................................................
//今日過號名單view；過號重新排序(處理過號)
Route::get('/register/late',['as' => 'register.late', 'uses' =>'RegisterController@late']);
Route::patch('/register/late/{section}',['as' => 'register.late.reset_register', 'uses' =>'RegisterController@reset_register']);

//..........................................
Route::get('/register/edit',['as' => 'register.edit', 'uses' =>'RegisterController@edit']);
Route::post('/register'      ,['as' => 'register.store', 'uses' =>'RegisterController@store']);
Route::patch('/register/{register}/update'  , ['as' => 'register.update', 'uses' => 'RegisterController@update']);

//列印收據..................................................................
//顯示看完診的名單
Route::get('/register/receipt',['as' => 'register.receipt', 'uses' =>'RegisterController@receipt']);
//顯示該單的看診明細(會員、醫生、症狀、用藥......)
Route::get('/register/{id}/detail',['as' => 'register.detail', 'uses' =>'RegisterController@detail']);


//藥物相關路由.......................................................................................
//藥物名單頁面view；新增藥物、刪除藥物
Route::get('/medicine',['as' => 'medicine.index', 'uses' =>  'MedicineController@index']);
Route::post('/medicine/store', ['as' => 'medicine.store', 'uses' => 'MedicineController@store']);
Route::delete('/medicine/{medicine}', 'MedicineController@destroy');
Route::get('medicine/{medicine}/edit', ['as' => 'medicine.edit','uses' => 'MedicineController@edit']);
Route::patch('/medicine/{medicine}/update'  , ['as' => 'medicine.update', 'uses' => 'MedicineController@update']);

Route::get('/per_week_section',['as' => 'per_week_section.index', 'uses' =>  'PerWeekSectionController@index']);
