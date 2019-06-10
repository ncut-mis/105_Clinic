<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon as Carbon;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $doctors=auth()->user()->clinic->doctors;//診所所有醫生

        foreach ($doctors as $doctor)
        {
            $current_doctors_section=$doctor->sections()->where('date',$date)->where('start','<',$time)->where('end','>',$time)->get();//目前有看診時段的醫生
//            dd($current_doctors_section);
            foreach ($current_doctors_section as $current_doctor_section)
            {
               $doctor_section_datas[] = $current_doctor_section;//門診時段資訊
//                echo   $doctor_section_datas;
            }
        }
                $data = ['doctor_section_datas' => $doctor_section_datas];
                return view('clinic.home',$data);
    }

    public function doctors()
    {
        $doctors=auth()->user()->clinic->doctors;
        $staffs=auth()->user()->clinic->staff;
        return view('clinic.doctors',['doctors'=>$doctors,'staffs'=>$staffs]);
    }

    public function staff()
    {
        $clinicstaff=auth()->user()->clinic->staff;
        return view('clinic.staff',['clinicstaff'=>$clinicstaff]);
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        return view('clinic.information');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        $file = $request->file('photo');
        $destinationPath = 'img/clinic';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);
        $clinic=auth()->user()->clinic;
        $clinic->update([
            'name' =>$request->name,
            'tel' =>$request->tel,
            'address' =>$request->address,
            'photo' => $file_name,
            'reservable_day' =>$request->reservable_day,
            'per_week_sections' =>$request->per_week_sections,
        ]);
        return view('clinic.information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        //
    }
}