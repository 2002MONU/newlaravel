<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_Achievement = Achievement::find(1);
        return view('admin.homepage.our-achievement',compact('our_Achievement'));
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
        $our_Achievement = Achievement::find($id);
        return view('admin.homepage.edit-achievement',compact('our_Achievement'));
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
            'experience' => 'required|integer',
            'after_sale' => 'required|integer',
            'field_service' => 'required|integer',
            'telecom_sites' => 'required|integer',
            'high_profile' => 'required|integer',
           
            
        ]);
        $our_Achievement =  Achievement::find($id);
        $our_Achievement->experience = $request->experience;
        $our_Achievement->after_sale = $request->after_sale;
        $our_Achievement->field_service = $request->field_service;
        $our_Achievement->telecom_sites = $request->telecom_sites;
        $our_Achievement->high_profile = $request->high_profile;
        $our_Achievement->save();
        return redirect()->route('achievements.index')->with('success','Achievement update successfully');
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
