<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JoinWithUs;
use Illuminate\Http\Request;

class JoinWithController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joinWithUs = JoinWithUs::get();
        return view('admin.joinwith.current-jobs',compact('joinWithUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.joinwith.add-current-jobs');
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
            'salary' => 'required|string|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2028',
            'priority' => 'required|integer|unique:join_with_us,priority',
            'status' => 'required|in:0,1',
        ]);

        $currentJobs = new JoinWithUs();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $currentJobs->job_logo = $name;
        }
        $currentJobs->title = $request->job_name;
        $currentJobs->description = $request->description;
        $currentJobs->location = $request->location;
        $currentJobs->salary = $request->salary;
        $currentJobs->priority = $request->priority;
        $currentJobs->status = $request->status;
        $currentJobs->save();
        return redirect()->route('join-with-us.index')->with('success','Join With Us add successfully');
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
        $curretJob = JoinWithUs::find($id);
        return view('admin.joinwith.edit-current-jobs',compact('curretJob'));
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
            'salary' => 'required|string|integer',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2028',
            'priority' => 'required|integer|unique:join_with_us,priority,'.$id,
            'status' => 'required|in:0,1',
        ]);

        $currentJobs =  JoinWithUs::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $currentJobs->job_logo = $name;
        }
        $currentJobs->title = $request->job_name;
        $currentJobs->description = $request->description;
        $currentJobs->location = $request->location;
        $currentJobs->salary = $request->salary;
        $currentJobs->priority = $request->priority;
        $currentJobs->status = $request->status;
        $currentJobs->save();
        return redirect()->route('join-with-us.index')->with('success','Join With Us update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $joinWithUs = JoinWithUs::find($id);

        if ($joinWithUs) {
            // Delete the image file from the folder if it exists
            $imagePath = public_path('assets/dynamics/' . $joinWithUs->job_logo);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Remove the file
            }

            // Delete the job image  record from the database
            $joinWithUs->delete();

            return redirect()->route('join-with-us.index')->with('success', 'Join With Us deleted successfully');
        }

    return redirect()->route('galleries.index')->with('error', 'Gallery not found');
    }
}
