<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Member;
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
        $sections = Section::join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','staff.name','sections.date','sections.next_register_no')
            ->get();
        $members=Member::orderBy('name')->get();
        $registers = Register::orderBy('id')->get();
        $doctors = auth()->user()->clinic->doctors()->get();
        $data= ['registers'=>$registers,'sections'=>$sections,'members'=>$members,'doctors'=>$doctors];
        return view('register.index',$data);
    }

    public function late()
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $sections = Section::join('doctors','doctors.id','=','sections.doctor_id')
            ->join('staff','staff.id','=','doctors.staff_id')
            ->where('date','=' ,$date)
            ->where('start','<',$time )->where('end','>',$time )
            ->select('sections.id','sections.start','staff.name','sections.date','sections.next_register_no')
            ->get();
        $members=Member::orderBy('name')->get();
        $registers = Register::orderBy('id')->get();
        $data= ['registers'=>$registers,'sections'=>$sections,'members'=>$members];
        return view('register.late',$data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register $register
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Register::destroy($id);
        return view('register.index');
    }

    public function add_register($id)
    {
        $add_register = Register::find($id);
        $add_register->status = 0;
        $add_register->save();
        return view('register.index');
    }

    public function reset_register(Section $sections,$id)
    {
        $registers = Register::find($id);
        $registers->status = 0;
        $registers->reservation_no = $sections->current_no+ 2.5;
        $registers->save();
        return view('register.index');
    }

}
