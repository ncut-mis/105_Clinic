<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Position;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
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
        $positions =Position::orderBy('id')->get();
        $data = ['positions' => $positions];
        return view('clinic.addstaff', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Staff::create([
            'clinic_id' =>auth()->user()->clinic->id,
            'position_id' =>$request->position_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'created_at' =>$request->date,
        ]);
        if ($request->position_id ==='4')
        {
            $clinic=auth()->user()->clinic->id;
            $staffs=auth()->user()->clinic->staff;
            $allstaffs =Staff::orderBy('id','DESC')->get();
                foreach ($allstaffs as $allstaff)
                    if($allstaff->clinic_id ===$clinic)
                    {
                        foreach ($staffs as $staff)
                        if($staff->id === $allstaff->id)
                        {
                            Doctor::create([
                                'clinic_id' =>$staff->clinic_id,
                                'staff_id' =>$staff->id,
                                'clinic_date' => $request->date,
                            ]);
                            break;
                        }
                        break;
                    }
                
        }
        return redirect()->route('clinic.addstaff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
