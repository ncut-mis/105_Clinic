<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Member;
use App\Patient;
use App\Register;
use App\Section;
use App\Staff;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $sections=Section::orderBy('start')->get();
        $members=Member::orderBy('name')->get();
        $registers = Register::orderBy('id')->get();
        $data= ['registers'=>$registers,'sections'=>$sections,'members'=>$members];
        return view('register.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registers=Register::orderBy('id')->get();
        $sections=Section::orderBy('id')->get();
        $members=Member::orderBy('id')->get();
        $data= ['sections'=>$sections,'members'=>$members,'registers'=>$registers];
        return view('register.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Register::create([
            'section_id' => $request->section_id,
            'member_id' =>$request->member_id,
            'number'=> $request->number,
            'status' => 0,
            'created_at' =>$request->date,
        ]);
        return redirect()->route('register.home');
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
        return view('/clinic/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
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
}
