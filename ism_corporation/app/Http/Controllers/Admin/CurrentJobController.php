<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrentJob;
use Illuminate\Http\Request;

class CurrentJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentJobs = CurrentJob::get();
        return view('admin.currentjobs.current-jobs',compact('currentJobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currentjobs.add-current-jobs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'job_title' => 'required|string',
            'priority' => 'required|integer|unique:current_jobs,priority',
            'status' => 'required|in:0,1',
        ]);

        $currentJobs = new CurrentJob();
        $currentJobs->job_name = $request->job_name;
        $currentJobs->description = $request->description;
        $currentJobs->location = $request->location;
        $currentJobs->type = $request->type;
        $currentJobs->job_title = $request->job_title;
        $currentJobs->priority = $request->priority;
        $currentJobs->status = $request->status;
        $currentJobs->save();
        return redirect()->route('currentjobs.index')->with('success','Current Jobs add successfully');
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
        $curretJob = CurrentJob::find($id);
        return view('admin.currentjobs.edit-current-jobs',compact('curretJob'));
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
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'job_title' => 'required|string',
            'priority' => 'required|integer|unique:current_jobs,priority,'.$id,
            'status' => 'required|in:0,1',
        ]);

        $currentJobs = CurrentJob::find($id);
        $currentJobs->job_name = $request->job_name;
        $currentJobs->description = $request->description;
        $currentJobs->location = $request->location;
        $currentJobs->type = $request->type;
        $currentJobs->job_title = $request->job_title;
        $currentJobs->priority = $request->priority;
        $currentJobs->status = $request->status;
        $currentJobs->save();
        return redirect()->route('currentjobs.index')->with('success','Current Jobs update successfully');
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
