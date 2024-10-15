<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.slider.slider-details',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,jpg,png|max:2048', 
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority',
         ];

        $messages = [
            'title.required' => 'The slider title is required.',
            'heading.required' => 'The slider heading is required.',
            'image.required' => 'The image is required.',
            'banner_image.image' => 'The image must be a valid image file.',
            'banner_image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'banner_image.max' => 'The image size must be less than 2MB.',
            'description.required'=>'The slider Description is required.',
            'status.required' => 'The slider status is required.',
            'status.in' => 'The slider status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];
           $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $data = new Slider();
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
            $data->banner_image = $imageName;
        }
       
        $data->title = $request->input('title');
        $data->heading = $request->input('heading');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('sliders.index')->with('success', 'Added Successfully.');
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
        return view('admin.slider.edit-slider',compact('slider'));
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
        $rules = [
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', 
            'description'=>'required|string',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority,'.$id,
         ];

        $messages = [
            'title.required' => 'The slider name is required.',
            'heading.required' => 'The slider name is required.',
            'image.required' => 'The image is required.',
            'banner_image.image' => 'The image must be a valid image file.',
            'banner_image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'banner_image.max' => 'The image size must be less than 2MB.',
            'description.required'=>'The slider Description is required.',
            'status.required' => 'The slider status is required.',
            'status.in' => 'The slider status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        
        ];
           $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $data =  Slider::find($id);
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/serviceImage'), $imageName);
            $data->banner_image = $imageName;
        }
       
        $data->title = $request->input('title');
        $data->heading = $request->input('heading');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
       
        $data->save();

        return redirect()->route('sliders.index')->with('success', 'Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id',$id)->first();
        if($slider){
            $oldImagePath2 = public_path('admin/serviceImage/' . $slider->banner_image);
           
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
           
            $slider->delete();
            return redirect()->back()->with('success','Slider details  delete  successfully');
        }else{
            return redirect()->back()->with('error','Slider Image does not found successfully');
        }
    }
}
