<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $our_Achievement = Achievement::find($id);
        return view('admin.homepage.edit-achievement',compact('our_Achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'experience' => 'required|integer',
            'completed_project' => 'required|integer',
            'ongoing_project' => 'required|integer',
            'skilled_worker' => 'required|integer',
        ]);

        $our_Achievement = Achievement::find($id);
        $our_Achievement->experience = $request->experience;
        $our_Achievement->completed_project = $request->completed_project;
        $our_Achievement->ongoing_project = $request->ongoing_project;
        $our_Achievement->skilled_worker = $request->skilled_worker;
        $our_Achievement->save();
        return redirect()->back()->with('success','Achievement update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
