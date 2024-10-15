<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{

    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }


    public function create()
    {
        return view('admin.slider.add');
    }


    public function store(Request $request)
    {

        $rules = [
            'heading' => 'required|string|max:255',
            'heading_2' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',

            'scrolling_text' => 'required|string|max:255',

            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority',
        ];

        $messages = [
            'heading.required' => 'The heading is required.',
            'heading.string' => 'The heading must be a string.',
            'heading.max' => 'The heading may not be greater than 255 characters.',
            'heading_2.required' => 'The heading-2 is required.',
            'heading_2.string' => 'The heading-2 must be a string.',
            'heading_2.max' => 'The heading-2 may not be greater than 255 characters.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',

            'scrolling_text.required' => 'The scrolling text is required.',
            'scrolling_text.string' => 'The scrolling text must be a string.',
            'scrolling_text.max' => 'The scrolling text may not be greater than 255 characters.',


            'status.required' => 'The product status is required.',
            'status.in' => 'The product status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate a unique slug

        $data = new Slider();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/sliderImage'), $imageName);
            $data->image = $imageName;
        }



        $data->heading = $request->input('heading');
        $data->scrolling_text = $request->input('scrolling_text');
        $data->heading_2 = $request->input('heading_2');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->save();

        return redirect()->route('sliders.index')->with('success', 'Added Successfully.');
    }


    public function show(Slider $slider)
    {
        //
    }


    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $rules = [
            'heading' => 'required|string|max:255',
            'heading_2' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'scrolling_text' => 'required|string|max:255',
           

            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority,' . $slider->id,
        ];

        $messages = [
            'heading.required' => 'The heading is required.',
            'heading.string' => 'The heading must be a string.',
            'heading.max' => 'The heading may not be greater than 255 characters.',
            'heading_2.required' => 'The heading-2 is required.',
            'heading_2.string' => 'The heading-2 must be a string.',
            'heading_2.max' => 'The heading-2 may not be greater than 255 characters.',

            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'image.max' => 'The image size must be less than 2MB.',


            'scrolling_text.required' => 'The scrolling text is required.',
            'scrolling_text.string' => 'The scrolling text must be a string.',
            'scrolling_text.max' => 'The scrolling text may not be greater than 255 characters.',

           

            'status.required' => 'The product status is required.',
            'status.in' => 'The product status must be either active or inactive.',
            'priority.required' => 'The priority is required.',
            'priority.integer' => 'The priority must be an integer.',
            'priority.unique' => 'The priority has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Generate a unique slug


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/sliderImage'), $imageName);
            $slider->image = $imageName;
        }




        $slider->heading = $request->input('heading');

        $slider->heading_2 = $request->input('heading_2');
        $slider->scrolling_text = $request->input('scrolling_text');
        $slider->status = $request->input('status');
        $slider->priority = $request->input('priority');
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Update Successfully.');
    }

    public function destroy(Slider $slider)
    {

        if ($slider->image && file_exists(public_path('admin/sliderImage/' . $slider->image))) {
            unlink(public_path('admin/sliderImage/' . $slider->image));
        }
        if ($slider->shape_image && file_exists(public_path('admin/sliderImage/' . $slider->shape_image))) {
            unlink(public_path('admin/sliderImage/' . $slider->shape_image));
        }



        $slider->delete();

        return redirect()->route('teams.index')->with('success', 'Deleted Successfully.');
    }
}
