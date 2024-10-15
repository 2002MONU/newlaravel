<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeExtra;
use Illuminate\Http\Request;

class HomeExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_extra = HomeExtra::find(1);
        return view('admin.homepage.home-extra-details',compact('home_extra'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = HomeExtra::find($id);
        return view('admin.homepage.edit-home-extra',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'on_time' => 'required|string',
            'on_time_heading' => 'required|string',
            'trusted_heading' => 'required|string',
            'best_heading' => 'required|string',
            'trusted_cleaner' => 'required|string',
            'best_quality' => 'required|string',
           ]);
           $howit_work = HomeExtra::find($id);
           $howit_work->on_time = $request->on_time;
           $howit_work->on_time_heading = $request->on_time_heading;
           $howit_work->trusted_heading = $request->trusted_heading;
           $howit_work->best_heading = $request->best_heading;
           $howit_work->trusted_cleaner = $request->trusted_cleaner;
           $howit_work->best_quality = $request->best_quality;
           $howit_work->save();
           return redirect()->route('homeextras.index')->with('success','Home extras update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
