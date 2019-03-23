<?php

namespace App\Http\Controllers;

use App\Diagnosis;


use App\Doctor;
use App\Examination;
use App\ExamineMedicine;
use App\Medicine;
use App\Member;
use App\Patient;
use App\Prescription;
use App\Recipe;
use App\Staff;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Diagnosis::create([
            'member_id' => $request->name,
            'doctor_id' => $request->doctor,
            'symptom' => $request->symptom,
        ]);
        $names = Member::orderBy('id')->get();
        $records = Diagnosis::orderBy('id')->get();
        $data=['names' => $names,'records' => $records];
        return redirect()->route('Examinations.edit',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis  $diagnosis)
    {
        $diagnosis=Diagnosis::find($diagnosis);
        $exams =Examination::orderBy('id')->get();
        $names = Member::orderBy('id')->get();
        $medicines = Medicine::orderBy('id')->get();
        $ExamineMedicines = Prescription::orderBy('id')->get();
        $records = Diagnosis::orderBy('id')->get();
        $staffs = Staff::orderBy('id')->get();
        $recipes = Prescription::orderBy('id')->get();
        $prescriptions = Prescription::orderBy('id')->get();
        $doctors = Doctor::orderBy('id')->get();
        $data=['exams' => $exams,'names' => $names,'medicines' => $medicines
            ,'ExamineMedicines' => $ExamineMedicines,'records' => $records,
            'staffs' => $staffs,'recipes' => $recipes,'prescriptions'=> $prescriptions
            ,'doctors'=> $doctors ,'diagnosis'=> $diagnosis];
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosis $diagnosis)
    {
        //
    }
}
