<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Prescription;
use App\Diagnosis;
use App\Doctor;
use App\Member;
use App\Patient;
use App\Register;
use App\Section;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $registers = Register::join('members','members.id','=','registers.member_id')
            ->join('sections','sections.id','=','registers.section_id')
            ->join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','staff.name AS staff_name',
                'sections.date','members.name AS member_name','sections.next_register_no',
                'registers.reservation_no','registers.id','registers.status','registers.note')
            ->orderBy('reservation_no','asc')
            ->get();
        $data= ['registers'=>$registers];
        return view('register.index',$data);
    }

    public function late()
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $registers = Register::join('members','members.id','=','registers.member_id')
            ->join('sections','sections.id','=','registers.section_id')
            ->join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','staff.name AS staff_name',
                'sections.date','members.name AS member_name','sections.next_register_no',
                'registers.reservation_no','registers.id','registers.status')
            ->get();
        $data= ['registers'=>$registers];
        return view('register.late',$data);
    }

    public function receipt()
    {
//        date_default_timezone_set( "Asia/Taipei");
//        $date = date("Y-m-d");
//        $time = date("H:i:s");
//        $sections = Section::join('doctors','doctors.id','=','sections.doctor_id')
//            ->join('staff','staff.id','=','doctors.staff_id')
//            ->where('date','=' ,$date)
//            ->where('start','<',$time )->where('end','>',$time )
//            ->select('sections.id','sections.start','staff.name','sections.date','sections.next_register_no')
//            ->get();
//        $members=Member::orderBy('name')->get();
//        $registers = Register::orderBy('id')->get();
//        $data= ['registers'=>$registers,'sections'=>$sections,'members'=>$members];
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $registers = Register::join('members','members.id','=','registers.member_id')
            ->join('sections','sections.id','=','registers.section_id')
            ->join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','staff.name AS staff_name',
                'sections.date','members.name AS member_name','sections.next_register_no','members.id AS members_id',
                'registers.reservation_no','registers.id','registers.status')
            ->get();
        $data= ['registers'=>$registers];
        return view('register.receipt',$data);
    }

    public function member_search(Request $request)
    {
        return View('register.search');
    }

    public function member_reservation(Request $request)
    {
        return View('register.reservation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $registers=Register::orderBy('id')->get();
        $doctors=auth()->user()->clinic->doctors()->get();
        $sections = Section::join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','sections.end','staff.name','sections.date','sections.next_register_no')
            ->orderBy('date','asc')
            ->get();
//          echo $sections;
        $keyword =$request->get('keyword');
        $members = Member::where('number','LIKE',"$keyword")->get();
        $data	=	['sections'=>$sections,'registers'=>$registers,'doctors'=>$doctors,'members'=> $members,];
        return View('register.create',$data);
    }

    public function create_reservation(Request $request)
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $registers=Register::orderBy('id')->get();
        $doctors=auth()->user()->clinic->doctors()->get();
        $sections = Section::join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','>' ,$date)
            ->select('sections.id','sections.start','staff.name','sections.date','sections.next_register_no')
            ->orderBy('date','asc')
            ->get();
//          echo $sections;
        $keyword =$request->get('keyword');
        $members = Member::where('number','LIKE',"$keyword")->get();
        $data	=	['sections'=>$sections,'registers'=>$registers,'doctors'=>$doctors,'members'=> $members,];
        return View('register.create_reservation',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Section $section)
    {
        $register_no = $section->next_register_no;
        Register::create([
            'section_id' => $section->id,
            'member_id' =>$request->member_id,
            'reservation_no'=> $register_no,
            'reminding_time' =>null,
            'reminding_no' =>null,
            'status' => 0,
        ]);
        $section->next_register_no= $register_no+1;
        $section->save();
        return redirect()->route('register.index');
    }

    public function reservation_store(Request $request,Section $section)
    {
        $register_no = $section->next_register_no;
        Register::create([
            'section_id' => $section->id,
            'member_id' =>$request->member_id,
            'reservation_no'=> $register_no,
            'reminding_time' =>null,
            'reminding_no' =>null,
            'status' => -1,
        ]);
        $section->next_register_no= $register_no+1;
        $section->save();
        return redirect()->route('register.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        $register->update([
            'status' => 0,
        ]);
        return redirect()->route('/clinic/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function cancel(Register $register)
    {
        $register->update([
            'status' => 4,]);
        return redirect()->route('register.index');
<<<<<<< HEAD
=======

>>>>>>> a23ba75121c9819f86e0ebf2df3a9718ca9d4f75
    }

    public function add_register($id)
    {
        $add_register = Register::find($id);
        $add_register->status = 0;
        $add_register->save();
        return redirect()->route('register.index');
    }

    public function reset_register($id)
    {
        $registers = Register::find($id);
        $registers->status = 0;
        $registers->reservation_no = $registers->section->current_no+ 2.5;//int
        $registers->save();
        return redirect()->route('register.index');
    }

    public function search(Patient $patient)
    {
        $doctor=Doctor::where('staff_id',auth()->user()->id)->get()->first();//取得醫生資料
        date_default_timezone_set("Asia/Taipei");
        $date=date("Y-m-d");
        $time=date("H:i:s");
        $current_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get()->first();//目前的看診時段
        $registers=$current_section->registers()->get();
        $members=Member::orderBy('id')->get();
        $data= ['patient' => $patient,'registers'=>$registers,'members'=>$members];
        return view('doctor.search',$data);
    }

    public function detail($id)
    {
        date_default_timezone_set("Asia/Taipei");
        $date = date("Y-m-d");
        $diagnosises = Diagnosis::join('members','members.id','=','diagnoses.member_id')
            ->join('doctors','doctors.id','=','diagnoses.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('member_id',$id)
            ->where('date','=' ,$date)
            ->select('diagnoses.member_id','diagnoses.doctor_id','staff.name AS staff_name','members.name AS member_name','diagnoses.symptom')
            ->get();
        //echo $diagnosises;
        $prescriptions = Diagnosis::join('prescriptions','prescriptions.diagnosis_id','=','diagnoses.id')
            ->join('medicines','medicines.id','=','prescriptions.medicine_id')
            ->where('member_id',[$id])
            ->select('prescriptions.id','prescriptions.diagnosis_id',
                'prescriptions.dosage','prescriptions.note','medicines.medicine')
            ->get();
        $data= ['diagnosises'=>$diagnosises,'prescriptions'=>$prescriptions];
        return view('register.detail',$data);
    }
}
