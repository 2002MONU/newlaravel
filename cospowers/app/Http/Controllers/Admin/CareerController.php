<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::get();
        return view('admin.careers.careers-details',compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.careers.add-careers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'job_name' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|string',
            'job_title' => 'required|string',
            'job_time' => 'required|string',
            'priority' => 'required|integer|unique:careers,priority',
            'status' => 'required|in:0,1',
            'description' => 'required|string',
        ]);

        $career = new Career();
        $career->job_name = $request->job_name;
        $career->location = $request->location;
        $career->job_type = $request->job_type;
        $career->job_title = $request->job_title;
        $career->job_time = $request->job_time;
        $career->priority = $request->priority;
        $career->status = $request->status;
        $career->description = $request->description;
        $career->save();
        return redirect()->route('careers.index')->with('success','Careers job add successfully');
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
        $career = Career::find($id);
        return view('admin.careers.edit-careers',compact('career'));
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
            'job_name' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|string',
            'job_title' => 'required|string',
            'job_time' => 'required|string',
            'priority' => 'required|integer|unique:careers,priority,'.$id,
            'status' => 'required|in:0,1',
            'description' => 'required|string',
        ]);

        $career =  Career::find($id);
        $career->job_name = $request->job_name;
        $career->location = $request->location;
        $career->job_type = $request->job_type;
        $career->job_title = $request->job_title;
        $career->job_time = $request->job_time;
        $career->priority = $request->priority;
        $career->status = $request->status;
        $career->description = $request->description;
        $career->save();
        return redirect()->route('careers.index')->with('success','Careers job add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::find($id)->delete();
        return redirect()->route('careers.index')->with('success','Careers details delete successfully');
    }
}
