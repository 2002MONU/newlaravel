<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeThreePoint;
use Illuminate\Http\Request;

class HomeThreePointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_extra = HomeThreePoint::find(1);
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
        $about = HomeThreePoint::find($id);
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
            'box_01_title' => 'required|string',
            'box_02_title' => 'required|string',
            'box_03_title' => 'required|string',
            'box_01_desc' => 'required|string',
            'box_02_desc' => 'required|string',
            'box_03_desc' => 'required|string',
        ]);

        $home_extra = HomeThreePoint::find($id);
        $home_extra->box_01_title = $request->box_01_title;
        $home_extra->box_02_title = $request->box_02_title;
        $home_extra->box_03_title = $request->box_03_title;
        $home_extra->box_01_desc = $request->box_01_desc;
        $home_extra->box_02_desc = $request->box_02_desc;
        $home_extra->box_03_desc = $request->box_03_desc;
        $home_extra->save();
        return redirect()->route('home-three-points.index')->with('success','Update successfully');
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
