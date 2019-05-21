<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Member;
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
        //
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
}
