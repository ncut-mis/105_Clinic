<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\PerWeekSection;
use App\Repositories\PerWeekSectionRepository;
use App\Staff;
use Illuminate\Http\Request;
use Auth;

class PerWeekSectionController extends Controller
{

    public function index()
    {
        $per_week_sections = PerWeekSection::orderby('doctor_id')->get();
        //dd($per_week_sections);
        $staffs = Staff::orderBy('id')->get();
        $doctors=auth()->user()->clinic->doctors;
        $data = ['per_week_sections' => $per_week_sections,'doctors'=>$doctors,'staffs'=> $staffs];
        return view('per_week_section', $data);
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'doctor_id' => 'required|max:255',
            'weekday' => 'required|max:255',
            'start_time' => 'required|max:255',
            'end_time' => 'required|max:255',
            'from' => 'required|max:255',
        ]);
        PerWeekSection::create($request->all());
        return redirect()->route('per_week_section.index');
//        auth()->user()->clinic->doctors()->create([
//            'doctor_id' => $request->doctor_id,
//            'weekday' => $request->weekday,
//            'start_time' => $request->start_time,
//            'end_time' => $request->end_time,
//            'from' => $request->from,
//
//        ]);

//        PerWeekSections::create([
//            'doctor_id' => $request->doctor_id,
//            'weekday' => $request->weekday,
//            'start_time' => $request->start_time,
//            'end_time' => $request->end_time,
//            'from' => $request->from,
//        ]);

    }


    public function show(PerWeekSection $per_week_sections)
    {
        //
    }


    public function edit(PerWeekSection $per_week_section,Staff $staff)
    {
        $per_week_sections = PerWeekSection::where('doctor_id',$staff->doctor_id)->get()->first();
        $data = ['per_week_sections' => $per_week_sections,'staff'=>$staff,'per_week_section' => $per_week_section];
        return view('doctor.per_week_section.edit', $data);
    }


    public function update(Request $request, PerWeekSection $per_week_section)
    {
        $per_week_section->update([
            'weekday' => $request->weekday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'from' => $request->from,
        ]);
        return redirect()->route('per_week_section.index');
    }


    public function destroy(Request $request,PerWeekSection $per_week_section)
    {
        PerWeekSection::destroy($per_week_section->id);
        return redirect()->route('per_week_section.index');
    }

    public function __construct(PerWeekSectionRepository $per_week_sections)
    {
        $this->middleware('auth');
    }

}
