<?php

namespace App\Http\Controllers;

use App\Diagnosis;
use App\Doctor;
use App\Examination;
use App\ExamineMedicine;
use App\Medicine;
use App\Member;
use App\Patient;
use App\PerWeekSection;
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
    public function home(Request $request)
    {
        if($request->session()->has('current')){
            $current_section=session('current')->section;
            $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();//取得醫生資料
            date_default_timezone_set("Asia/Taipei");
            $date=date("Y-m-d");
            $time=date("H:i:s");
            $current_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get()->first();//目前的看診時段
        }
        else{

           $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();//取得醫生資料
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $time=date("H:i:s");
        $current_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get()->first();//目前的看診時段
    }
        $registers=$current_section->registers()->orderby('reservation_no', 'ASC')->get();//目前的看診時段所有病患掛號名單
        //$patient=$registers->member()->get();
        $patients=Member::orderBy('id')->get();
        $waiting_list=$current_section->registers()->where('status',0)->orderBy('reservation_no', 'ASC')->get();//目前的候診名單
        $now=$current_section->registers()->where('status',1)->get()->first();//目前的正在看診名單
        $late_list=$current_section->registers()->where('status',3)->get();//目前的過號名單

//        if(session('next')!=='finish')
//        {
        $next =$waiting_list->first();//下一個看診者
        session(['next' => $next]);
//        }
        if(session('next')===null)
        {
            $now->status=3;
            $now->save();
            $next='finish';
            session(['next' => $next]);
        }
//         if(session('next')==='finish')
//        {
//            $next='finish';
//            session(['next' => $next]);
//        }
        $number_of_reservations=$current_section->reservations()->count();//目前看診時段預約人數
        $data = ['doctor' => $doctor,'current_section' =>  $current_section,'registers' => $registers,'patients' => $patients
                , 'waiting_list' =>  $waiting_list,'late_list' =>  $late_list,'number_of_reservations' =>  $number_of_reservations
                , 'next' => $next  , 'now' =>  $now
                ];
        return view('doctor.home', $data);
    }

    public function profile(Doctor $doctor)
    {
        $per_week_sections=PerWeekSection::orderBy('id')->get();
        $data = ['doctor' => $doctor,'per_week_sections' => $per_week_sections];
        return view('clinic.profile',$data);
    }

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
