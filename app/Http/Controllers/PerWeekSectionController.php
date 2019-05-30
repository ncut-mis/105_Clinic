<?php

namespace App\Http\Controllers;

use App\PerWeekSection;
use Illuminate\Http\Request;
use Auth;

class PerWeekSectionController extends Controller
{

    public function index()
    {
        $per_week_sections = PerWeekSection::where('doctor_id', Auth::user()->clinic->doctors)->get();
        $doctors=auth()->user()->clinic->doctors;
        $data = ['per_week_sections' => $per_week_sections,'doctors'=>$doctors];
        return view('per_week_section', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PerWeekSection  $perWeekSection
     * @return \Illuminate\Http\Response
     */
    public function show(PerWeekSection $perWeekSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PerWeekSection  $perWeekSection
     * @return \Illuminate\Http\Response
     */
    public function edit(PerWeekSection $perWeekSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PerWeekSection  $perWeekSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerWeekSection $perWeekSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PerWeekSection  $perWeekSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerWeekSection $perWeekSection)
    {
        //
    }

}
