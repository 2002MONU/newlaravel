<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurAchievement;
use Illuminate\Http\Request;

class OurAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_Achievement = OurAchievement::find(1);
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
        $our_Achievement = OurAchievement::find($id);
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
            'projact_worked' => 'required|string',
            'expert_worker' => 'required|string',
            'happy_client' => 'required|string',
            'text_05_text_report' => 'required|string',
            'text_06_text_report' => 'required|string',
            'upcoming_project' => 'required|string',
            'upcoming_project_text' => 'required|string',
            'happy_client_text' => 'required|string',
            'expert_worker_text' => 'required|string',
            'projact_worked_text' => 'required|string',
            'text_05_text' => 'required|string',
            'text_06_text' => 'required|string',
            
        ]);
        $our_Achievement = OurAchievement::find($id);
        

        $our_Achievement->projact_worked = $request->projact_worked;
        $our_Achievement->expert_worker = $request->expert_worker;
        $our_Achievement->happy_client = $request->happy_client;
        $our_Achievement->upcoming_project = $request->upcoming_project;
        $our_Achievement->upcoming_project_text = $request->upcoming_project_text;
        $our_Achievement->happy_client_text = $request->happy_client_text;
        $our_Achievement->expert_worker_text = $request->expert_worker_text;
        $our_Achievement->text_06_text_report = $request->text_06_text_report;
        $our_Achievement->projact_worked_text = $request->projact_worked_text;
        $our_Achievement->text_05_text_report = $request->text_05_text_report;
        $our_Achievement->text_06_text = $request->text_06_text;
        $our_Achievement->text_05_text = $request->text_05_text;
        $our_Achievement->save();
        return redirect()->route('ourachievements.index')->with('success','Our achievement update successfully');
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
