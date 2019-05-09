<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Repositories\MedicineRepository;
use Illuminate\Http\Request;
//use Auth;
//use App\Http\Requests;
class MedicineController extends Controller
{
    protected $medicines,$clinic_id;
    public function index(Request $request)
    {
        $medicines = Medicine::where('clinic_id', Auth::user()->clinic->id)->get(); //不行


        return view('medicine', [
            'medicines' => $medicines,
        ]);
//        $medicines=auth()->user()->medicines;

//        return view('medicine');
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
        $this->validate($request, [
            'medicine' => 'required|max:255',
        ]);

        auth()->user()->medicines()->create([
            'medicine' => $request->medicine,
        ]);
        return redirect('/medicines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Medicine $medicine)
    {
//        $this->authorize('destroy', $medicine);
//        $medicine->delete();
//        return redirect('/medicines');
    }

    public function __construct(MedicineRepository $medicines)
    {
        $this->middleware('auth');
    }

}
