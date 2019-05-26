<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use App\Doctor;
use App\Medicine;
use App\Member as Patient;
use App\Member;
use App\Prescription;
use App\Register;
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
    public function create(Patient $patient,Diagnosis $diagnosis)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();//取得醫生資料
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $time=date("H:i:s");
        $current_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get()->first();//目前的看診時段
        $one=$current_section->registers()->where('status',1)->get()->first();
        if($one!==null)
        {
            session(['one' => $one]);
            $one_no=session('one');
            $one_no->status=3;
            $one_no->save();
        }

        $current=session('next');
        $current->status=1;  //已呼叫
        $current_section->update(['current_no' =>$current->number]);
        $current->save();
        session(['current' => $current]);

        $waiting_list=$current_section->registers()->where('status',0)->orderBy('number', 'ASC')->get();
        $next=$waiting_list->first(); //下一個看診者
        session(['next' => $next]);

        $data=['patient' => $patient,'next' => $next,'one' => $one];
        return view('doctor.diagnosis',$data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Patient $patient)
    {
        date_default_timezone_set("Asia/Taipei");
       Diagnosis::create([
            'member_id' =>$patient->id,
            'doctor_id' =>$doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first()->id,
            'symptom' => $request->symptom,
            'created_at' => date("Y-m-d"),
        ]);
        return redirect()->route('patient.diagnosis.edit2',$patient);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register,Patient $patient,Diagnosis $diagnosis)
    {

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
            'staffs' => $staffs,'recipes' => $recipes,'prescriptions'=> $prescriptions
            ,'doctors'=> $doctors ,'diagnosis'=> $diagnosis];
        return view('edit', $data);
    }
    public function edit2(Patient $patient)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();
        date_default_timezone_set("Asia/Taipei");//+8hour
        $date=date("Y-m-d");
        $diagnosis=$doctor->diagnoses()->where('created_at',$date)->where('member_id',$patient->id)->get()->first();
        $medicines = Medicine::where('clinic_id',auth()->user()->clinic->id)->get();
        $prescriptions=$diagnosis->prescriptions()->get();
        $next=session('next');
        $data=['patient' => $patient,'diagnosis' => $diagnosis,'medicines' => $medicines,'prescriptions' => $prescriptions,'next' => $next];
        return view('doctor.diagnosis.edit',$data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {

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
