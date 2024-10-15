<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.homepage.slider-details',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.add-slider');
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
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:sliders,priority',
            'status' => 'required|in:0,1',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider text added successfully');
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
        $slider = Slider::find($id);
        return view('admin.homepage.edit-slider',compact('slider'));
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
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:sliders,priority,'.$id,
            'status' => 'required|in:0,1',
        ]);

        $slider =  Slider::find($id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('sliders.index')->with('success','Slider text update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with('success','Slider text delete successfully');
    }
}
