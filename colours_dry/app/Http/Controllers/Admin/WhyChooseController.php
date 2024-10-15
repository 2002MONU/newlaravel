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
        $whyChoose = WhyChoose::find($id);
        return view('admin.slider.edit-whychoose',compact('whyChoose'));
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
            'title' => 'required|string|max:255',
           'image' => 'image|mimes:jpeg,jpg,png|max:5120',
           'step_01_title' => 'required|string|max:255',
           'step_02_title' => 'required|string|max:255',
           'step_03_title' => 'required|string|max:255',
           'step_01_desc' => 'required|string',
           'step_02_desc' => 'required|string',
           'step_03_desc' => 'required|string',
         
        ]);
     
            $data= WhyChoose::find($id);
             if ($request->hasFile('image')) {
                $img_extension = $request->file('image')->getClientOriginalExtension();
                $name = time() . '.' . $img_extension;
                $pathimage = $request->file('image')->move(public_path('admin/aboutImage'), $name);
                $data->image= $name;
            } 
             $data->title = $request->input('title');
            $data->step_01_title = $request->input('step_01_title');
            $data->step_02_title = $request->input('step_02_title');
            $data->step_03_title = $request->input('step_03_title');
            
            $data->step_01_desc = $request->input('step_01_desc');
            $data->step_02_desc = $request->input('step_02_desc');
    
            $data->step_03_desc = $request->input('step_03_desc');
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
