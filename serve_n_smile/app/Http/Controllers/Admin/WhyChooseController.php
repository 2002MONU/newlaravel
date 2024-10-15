<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whychoose = WhyChoose::find(1);
        return view('admin.about.whychoose',compact('whychoose'));
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
        $whychoose = WhyChoose::find($id);
        return view('admin.about.edit-whychoose',compact('whychoose'));
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
            'h1' =>'required|string',
            'h2' =>'required|string',
            'h3' =>'required|string',
            'h4' =>'required|string',
            'title' =>'required|string',
            'description' =>'required|string',
        ]);

        $whychoose = WhyChoose::find($id);
        $whychoose->h1 = $request->h1;
        $whychoose->h2 = $request->h2;
        $whychoose->h3 = $request->h3;
        $whychoose->h4 = $request->h4;
        $whychoose->title = $request->title;
        $whychoose->description = $request->description;
        $whychoose->save();
        return redirect()->route('whychooses.index')->with('success','Why choose us update successfully');
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
