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

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams =Diagnosis::orderBy('id')->get();
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
            'staffs' => $staffs,'recipes' => $recipes,'prescriptions'=> $prescriptions,'doctors'=> $doctors];
        return view('Examinations',$data);
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
        Prescription::create([
        'diagnosis_id' => $request->record,
        'medicine_id' => $request->medicine_id,
         'dosage' => $request->dosage,
         'note' => $request->note,
    ]);
        return redirect()->route('Examinations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {

    }
}
