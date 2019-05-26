<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use App\Medicine;
use App\Prescription;
use Illuminate\Http\Request;

use App\Member as Patient;
use Illuminate\Support\Facades\Session;

class PrescriptionController extends Controller
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
    public function store(Request $request,Patient $patient,Diagnosis $diagnosis)
    {
        Prescription::create([
            'diagnosis_id' =>$diagnosis->id,
            'medicine_id' =>$request->medicine_id,
            'dosage' => $request->dosage,
            'note' => $request->note,
        ]);
        $register=session('register');
        if ($register->member_id===$patient->id)
        {
        $register=session('register');
        $register->status=2;
        $register->save();
            return redirect()->route('search.diagnosis.compile',$patient);
        }
        else{
            $current=session('current');
            $current->status=2;  //已看診
            $current->save();
            return redirect()->route('patient.diagnosis.edit2',$patient);
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient,Prescription $prescription)
    {
        Prescription::destroy($prescription->id);
        $register=session('register');
        if ($register->member_id===$patient->id)
        {
            return redirect()->route('search.diagnosis.compile',$patient);
        }
        else {
            return redirect()->route('patient.diagnosis.edit2', $patient);
        }
    }
}
