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
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use  Auth;
use phpDocumentor\Reflection\Types\Nullable;

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
            return redirect()->route('firebase.late',$patient);
        }
        $current=session('next');
        $current->status=1;  //已呼叫
        if($current->reservation_no == (int)$current->reservation_no)
        {
            $current_section->update(['current_no' =>$current->reservation_no]);
        }
        $current->save();
        session(['current' => $current]);

        $registers=$current_section->registers()->get();
        foreach ($registers as $register)
        {
            if($register->reminding_no!==null)
            {
              $if_equal_current_no = $register->reservation_no - $register->reminding_no;
             if($current_section->current_no===$if_equal_current_no)
              {
               $optionBuilder = new OptionsBuilder();
               $optionBuilder->setTimeToLive(60*20);
               $notificationBuilder = new PayloadNotificationBuilder(Auth::user()->clinic->name.'通知');
               $notificationBuilder->setBody('目前看診號碼為'.$current_section->current_no.'號,還有'.$register->reminding_no.'位就輪到您囉')->setSound('default');
               $dataBuilder = new PayloadDataBuilder();
               $dataBuilder->addData(['a_data' => 'my_data']);
               $option = $optionBuilder->build();
               $notification = $notificationBuilder->build();
               $data = $dataBuilder->build();
               $token = "fXBRQnqdcVo:APA91bEVvrBRXL7VyCiIikWeQFPvk7VvH4KUmFuh1pZFItkRaREdWkHOYhp6PBBsU5NxV9CtXCGbWSn631kNAvz6few6cEsrU-0qkvkgPSz_Vg5g-SgAS5eXGiC-QrNBr5_uZTjar5Qm";
               $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
               $downstreamResponse->numberSuccess();
               $downstreamResponse->numberFailure();
               //return Array - you must remove all this tokens in your database
               $downstreamResponse->tokensToDelete();
               //return Array (key : oldToken, value : new token - you must change the token in your database )
               $downstreamResponse->tokensToModify();
               //return Array - you should try to resend the message to the tokens in the array
               $downstreamResponse->tokensToRetry();
               // return Array (key:token, value:error) - in production you should remove from your database the tokens
              }
            }
        }

        $waiting_list=$current_section->registers()->where('status',0)->orderBy('reservation_no', 'ASC')->get();
        $next=$waiting_list->first(); //下一個看診者
        session(['next' => $next]);
//        session(['register' => $register]);
        $records = $patient->diagnoses()->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->select('diagnoses.id','diagnoses.date','staff.name','diagnoses.symptom')
            ->orderBy('id','asc')
            ->get();

        $data=['patient' => $patient,'next' => $next,'one' => $one,'records' => $records];
        return view('doctor.diagnosis',$data);
    }
    public function continue(Patient $patient)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();//取得醫生資料
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $time=date("H:i:s");
        $current_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get()->first();//目前的看診時段

        $waiting_list=$current_section->registers()->where('status',0)->orderBy('reservation_no', 'ASC')->get();
        $next=$waiting_list->first(); //下一個看診者
        session(['next' => $next]);

        $records = $patient->diagnoses()->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->select('diagnoses.id','diagnoses.date','staff.name','diagnoses.symptom')
            ->orderBy('id','asc')
            ->get();
//
        $medicines = Medicine::where('clinic_id',Auth()->user()->clinic->id)->get();
        $data=['patient' => $patient,'medicines' => $medicines,'next' => $next,'records' => $records];
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
            'date' => date("Y-m-d"),
        ]);
        return redirect()->route('patient.diagnosis.edit2',$patient);
    }
    public function post(Request $request,Patient $patient)
    {
        date_default_timezone_set("Asia/Taipei");
        Diagnosis::create([
            'member_id' =>$patient->id,
            'doctor_id' =>$doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first()->id,
            'symptom' => $request->symptom,
            'date' => date("Y-m-d"),
        ]);
        return redirect()->route('search.diagnosis.compile',$patient);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register,Patient $patient,Diagnosis $diagnosis)
    {
        session(['register' => null]);
        session(['register' => $register]);
        $register= $register->id;
        $records = $patient->diagnoses()->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->select('diagnoses.id','diagnoses.date','staff.name','diagnoses.symptom')
            ->orderBy('id','asc')
            ->get();
        $data=['patient' => $patient,'register' => $register,'records' => $records];
        return view('doctor.diagnosis.show',$data);
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
        $diagnosis=$doctor->diagnoses()->where('date',$date)->where('member_id',$patient->id)->get()->last();
        $medicines = Medicine::where('clinic_id',auth()->user()->clinic->id)->get();
        $prescriptions=$diagnosis->prescriptions()->get();
        $next=session('next');
        $records = $patient->diagnoses()->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->select('diagnoses.id','diagnoses.date','staff.name','diagnoses.symptom')
            ->orderBy('id','asc')
            ->get();

        $data=['patient' => $patient,'diagnosis' => $diagnosis,'medicines' => $medicines,
            'prescriptions' => $prescriptions,'next' => $next,'records' => $records];
        return view('doctor.diagnosis.edit',$data);
    }

    public function compile(Patient $patient)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();
        date_default_timezone_set("Asia/Taipei");//+8hour
        $date=date("Y-m-d");
        $diagnosis=$doctor->diagnoses()->where('date',$date)->where('member_id',$patient->id)->get()->first();
        $medicines = Medicine::where('clinic_id',auth()->user()->clinic->id)->get();
        $prescriptions=$diagnosis->prescriptions()->get();
        $records = $patient->diagnoses()->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->select('diagnoses.id','diagnoses.date','staff.name','diagnoses.symptom')
            ->orderBy('id','asc')
            ->get();

        $data=['patient' => $patient,'diagnosis' => $diagnosis,'medicines' => $medicines
            ,'prescriptions' => $prescriptions,'records' => $records];
        return view('doctor.diagnosis.update',$data);
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
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first()->id;
        $symptom=Diagnosis::where('doctor_id',$doctor)->where('member_id',$patient->id)->get()->last();
        $symptom->update(['symptom' =>$request->symptom]);
        return redirect()->route('patient.diagnosis.edit2',$patient);
    }

    public function renew(Request $request, Patient $patient)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first()->id;
        $symptom=Diagnosis::where('doctor_id',$doctor)->where('member_id',$patient->id)->get()->last();
        $symptom->update(['symptom' =>$request->symptom]);
        return redirect()->route('search.diagnosis.compile',$patient);
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
