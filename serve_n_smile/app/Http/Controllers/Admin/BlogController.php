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
            'title' => 'required|string',
            'post_by' => 'required|string',
            'like' => 'required|string|integer',
            'comments' => 'required|string|integer',
            'description' => 'required|string',
            'blog_description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:blogs,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $blog = new Blog();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $blog->image = $name;
        }
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->writer_name = $request->post_by;
        $blog->like = $request->like;
        $blog->comments = $request->comments;
        $blog->description = $request->description;
        $blog->blog_description = $request->blog_description;
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
            'title' => 'required|string',
            'post_by' => 'required|string',
            'like' => 'required|string|integer',
            'comments' => 'required|string|integer',
            'status' => 'required|in:0,1',
            'description' => 'required|string',
            'blog_description' => 'required|string',
            'priority' => 'required|integer|unique:blogs,priority,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $blog =  Blog::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $blog->image = $name;
        }
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->writer_name = $request->post_by;
        $blog->like = $request->like;
        $blog->comments = $request->comments;
        $blog->description = $request->description;
        $blog->blog_description = $request->blog_description;
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
        $blog = Blog::where('id',$id)->first();
        if($blog){
            $oldImagePath2 = public_path('assets/dynamics/' . $blog->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $blog->delete();
            return redirect()->back()->with('success','Blog Image & details delete successfully');
        }else{
            return redirect()->back()->with('error','Blog Image does not found successfully');
        }
    }
}
