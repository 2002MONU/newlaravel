<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWork;
use Illuminate\Http\Request;

class HowItWorkController extends Controller
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
        $howitwork = HowItWork::find($id);
        return view('admin.slider.edit-howitwork',compact('howitwork'));
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
            'title_1' => 'required|string|max:255',
            'title_2' => 'required|string|max:255',
            'title_3' => 'required|string|max:255',
            'title_4' => 'required|string|max:255',
            'image_1' => 'image|mimes:jpeg,jpg,png,svg|max:5120',
            'image_2' => 'image|mimes:jpeg,jpg,png,svg|max:5120',
            'image_3' => 'image|mimes:jpeg,jpg,png,svg|max:5120',
            'image_4' => 'image|mimes:jpeg,jpg,png,svg|max:5120',
             ]);
     
            $data= HowItWork::find($id);
             if ($request->hasFile('image_1')) {
                $img_extension = $request->file('image_1')->getClientOriginalExtension();
                $name = time() . '.' . $img_extension;
                $pathimage = $request->file('image_1')->move(public_path('admin/aboutImage'), $name);
                $data->box_01_image= $name;
            } 
            if ($request->hasFile('image_2')) {
                $img_extension = $request->file('image_2')->getClientOriginalExtension();
                $name = (time()+1) . '.' . $img_extension;
                $pathimage = $request->file('image_2')->move(public_path('admin/aboutImage'), $name);
                $data->box_02_image= $name;
            } 
            if ($request->hasFile('image_3')) {
                $img_extension = $request->file('image_3')->getClientOriginalExtension();
                $name = (time()+2) . '.' . $img_extension;
                $pathimage = $request->file('image_3')->move(public_path('admin/aboutImage'), $name);
                $data->box_03_image= $name;
            } 
            if ($request->hasFile('image_4')) {
                $img_extension = $request->file('image_4')->getClientOriginalExtension();
                $name = (time()+3) . '.' . $img_extension;
                $pathimage = $request->file('image_4')->move(public_path('admin/aboutImage'), $name);
                $data->box_04_image= $name;
            } 
    
     
            $data->box_01_title = $request->input('title_1');
            $data->box_02_title = $request->input('title_2');
            $data->box_03_title = $request->input('title_3');
            $data->box_04_title = $request->input('title_4');
            $data->save();
    
            return redirect()->back()
                            ->with('success','Updated Successfully.');
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
