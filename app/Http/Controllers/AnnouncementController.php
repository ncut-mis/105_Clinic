<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements=Announcement::
            where('clinic_id','=',auth()->user()->clinic->id)
            ->orderBy('created_at','DESC')->get();
        $data=['announcements'=>$announcements];
        return view('clinic.posts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinic.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set( "Asia/Taipei");
        $date = date("Y:m:d:H:i");
        Announcement::create([
            'clinic_id' => $request->clinic_id,
            'title' => $request['title'],
            'content'=>$request['content'],
            'datetime'=> $date,
        ]);
        return redirect()->route('clinic.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement,$id)
    {
        $announcement=Announcement::find($id);
        $data=['announcement'=>$announcement];
        return view('clinic.posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement,$id)
    {
        $announcement = Announcement::find($id);
        $data = ['announcement' => $announcement];
        return view('clinic.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement,$id)
    {
        $announcement=Announcement::find($id);
        $announcement->update([
            'title' => $request['title'],
            'content'=>$request['content'],
        ]);
        return redirect()->route('clinic.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement,$id)
    {
        Announcement::destroy($id);
        return redirect()->route('clinic.posts.index');
    }
}
