<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
{
       public function index()
    {
        $gallery = Gallery::get();
        return view('admin.gallery.index', compact('gallery'));
    }

   
    public function create()
    {
        return view('admin.gallery.add');
        
    }

    
    public function store(Request $request)
    {
        // return $request;
        $rules = [
           'title'=>'required|string',
           'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:2048',         
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:galleries,priority',
        ];

        $messages = [
            'title.required'=> 'The title is required',
            'title.string' => 'The title must be an string.',
            'images.required' => 'The image is required.',
            'images.image' => 'The image must be a valid image file.',
            'images.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'images.max' => 'The image size must be less than 2MB.',
           

         
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
     
        $data = new Gallery();
        $imageNames = []; // Initialize an array to hold image names
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the public folder
                $image->move(public_path('admin/galleryImage'), $name);
                // Store each image name in the array
                $imageNames[] = $name;
            }
           $data->image = json_encode($imageNames);
        }
        
        $data->title = $request->input('title');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->save();

        return redirect()->route('galleries.index')->with('success', 'Added Successfully.');
    }

        public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

  
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'title'=>'required|string',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048',           
            'status' => 'required|in:1,0',
           'priority' => 'required|integer|unique:galleries,priority,' .  $gallery->id,
        ];

        $messages = [
         
            'title.required'=> 'The title is required',
            'title.string' => 'The title must be an string.',
            'images.*.image' => 'The image must be a valid image file.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, jpg, png.',
            'images.*.max' => 'The image size must be less than 2MB.',
           
           

         
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
     
     
        $imageNames = []; // Initialize an array to hold image names
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique name for each image
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the public folder
                $image->move(public_path('admin/galleryImage'), $name);
                // Store each image name in the array
                $imageNames[] = $name;
            }
            $gallery->image = json_encode($imageNames);
        }
        
     $gallery->title = $request->input('title');
       $gallery->status = $request->input('status');
       $gallery->priority = $request->input('priority');
       $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Updated Successfully.');
    }

  
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && file_exists(public_path('admin/galleryImage/' . $gallery->image))) {
            unlink(public_path('admin/galleryImage/' . $gallery->image));
        }

       
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Deleted Successfully.');
    }
}
