<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWork;
use Illuminate\Http\Request;

class HowitWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $howItWork = HowItWork::find($id);
        return view('admin.homepage.edit-howit-works',compact('howItWork'));
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
            'planning' =>'required|string',
            'planning_desc' =>'required|string',
            'design' =>'required|string',
            'design_desc' =>'required|string',
            'construct' =>'required|string',
            'construct_desc' =>'required|string',
            'finishing' =>'required|string',
            'finishing_desc' =>'required|string',
        ]);

        $howItWork = HowItWork::find($id);
        $howItWork->planning = $request->planning;
        $howItWork->planning_desc = $request->planning_desc;
        $howItWork->design = $request->design;
        $howItWork->design_desc = $request->design_desc;
        $howItWork->construct = $request->construct;
        $howItWork->construct_desc = $request->construct_desc;
        $howItWork->finishing = $request->finishing;
        $howItWork->finishing_desc = $request->finishing_desc;
        $howItWork->save();
        return redirect()->back()->with('success','How it works edit successfully');
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
