<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_details = Blog::get();
        return view('admin.blog.blog-details',compact('blog_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add-blog-details');
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
            'title' => 'required|string|unique:blogs,title',
            'description' => 'required|string',
            'blog_description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:blogs,priority',
            'small_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_02' => 'required',
            'image_02.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // Validation for each image in the array
           
        ]);
        $blog = new Blog();
        if($request->hasFile('small_image')){
            $filename = $request->file('small_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('small_image')->move(public_path('assets/dynamics'),$name);
            $blog->small_image = $name;
        }
        if($request->hasFile('main_image')){
            $filename = $request->file('main_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('main_image')->move(public_path('assets/dynamics'),$name);
            $blog->main_image = $name;
        }
        if ($request->hasFile('image_02')) {
            $imageNames = [];  // Array to store image names
            foreach ($request->file('image_02') as $image) {
                // Generate a unique filename for each image
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the public directory
                $image->move(public_path('assets/dynamics'), $filename);
                // Save the image filename in the array
                $imageNames[] = $filename;
            }
            // Save the image names to the database as a JSON or serialized array
            $blog->images_02 = json_encode($imageNames);
        }
        
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->description_02 = $request->blog_description;
        $blog->status = $request->status;
        $blog->priority = $request->priority;
        $blog->save();
        return redirect()->route('blogs.index')->with('success','Blogs add successfully');
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
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog',compact('blog'));
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
             'title' => 'required|string|unique:blogs,title,'.$id,
            'description' => 'required|string',
            'blog_description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:blogs,priority,'.$id,
            'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            //'image_02' => 'required',
            'image_02.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048', // Validation for each image in the array
        ]);
        $blog =  Blog::find($id);
        if($request->hasFile('small_image')){
            $filename = $request->file('small_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('small_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $blog->small_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $blog->small_image = $name;
        }
        if($request->hasFile('main_image')){
            $filename = $request->file('main_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('main_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $blog->main_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $blog->main_image = $name;
        }
        if ($request->hasFile('image_02')) {
            // Check if there are existing images and delete them
            if ($blog->images_02) {
                $oldImages = json_decode($blog->images_02);
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('assets/dynamics/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);  // Delete old image
                    }
                }
            }
            $imageNames = [];  // Array to store new image names
            foreach ($request->file('image_02') as $image) {
                // Generate a unique filename for each image
                $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the public directory
                $image->move(public_path('assets/dynamics'), $filename);
                // Save the image filename in the array
                $imageNames[] = $filename;
            }
         // Save the new image names to the database as a JSON array
            $blog->images_02 = json_encode($imageNames);
        }
        
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->description_02 = $request->blog_description;
        $blog->status = $request->status;
        $blog->priority = $request->priority;
        $blog->save();
        return redirect()->route('blogs.index')->with('success','Blogs update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // Find the blog by ID
    $blog = Blog::find($id);

        // Check if the blog exists
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found.');
        }

            // Check if images exist in the blog and delete them
            if ($blog->small_image) {
                $smallImagePath = public_path('assets/dynamics/' . $blog->small_image);
                if (file_exists($smallImagePath)) {
                    unlink($smallImagePath);  // Delete the small image
                }
            }

                if ($blog->main_image) {
                    $mainImagePath = public_path('assets/dynamics/' . $blog->main_image);
                    if (file_exists($mainImagePath)) {
                        unlink($mainImagePath);  // Delete the main image
                    }
                }

                if ($blog->images_02) {
                    $images_02 = json_decode($blog->images_02);
                    foreach ($images_02 as $image) {
                        $imagePath = public_path('assets/dynamics/' . $image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);  // Delete each image in the images_02 array
                        }
                    }
                }

                    // Delete the blog from the database
                    $blog->delete();

                    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully along with associated images.');
                }

    
}
