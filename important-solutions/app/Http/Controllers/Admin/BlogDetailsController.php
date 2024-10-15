<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogDetailsController extends Controller
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
        return view('admin.blog.add-blog');
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
            'title' =>'required|string',
            'description' =>'required|string',
            'blog_post_date' =>'required|string',
            'post_by' =>'required|string',
            'blog_image' =>'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'priority' =>'nullable|integer|unique:blogs,priority',
            'status' =>'required|in:0,1',
        ]);

        $blog = new Blog();
      if($request->hasFile('blog_image')){
        $filename = $request->file('blog_image')->getClientOriginalExtension();
        $image_name = time().'.'.$filename;
        $filepath = $request->file('blog_image')->move(public_path('assets/dynamics/blog'),$image_name);
        $blog->blog_image = $image_name;
      }
        $blog->title = $request->title; 
        $blog->slug = Str::slug($request->title);
        $blog->post_by = $request->post_by; 
        $blog->priority = $request->priority; 
        $blog->description = $request->description; 
        $blog->blog_date = $request->blog_post_date; 
        $blog->status = $request->status; 
        $blog->save();
        return redirect()->route('blogdetails.index')->with('success','Blog details add successfully');
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
            'title' =>'required|string',
            'description' =>'required|string',
            'blog_post_date' =>'nullable|string',
            'post_by' =>'required|string',
            'blog_image' =>'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'priority' =>'nullable|integer|unique:blogs,priority,'.$id,
            'status' =>'required|in:0,1',
        ]);

        $blog =  Blog::find($id);
      if($request->hasFile('blog_image'))
      {
          $filename = $request->file('blog_image')->getClientOriginalExtension();
          $image_name = time().'.'.$filename;
          $filepath = $request->file('blog_image')->move(public_path('assets/dynamics/blog'),$image_name);
         
          $blog->blog_image = $image_name;
      }else{
          $blog->blog_image = null;
      }
        $blog->title = $request->title; 
        $blog->slug = Str::slug($request->title);
        $blog->post_by = $request->post_by; 
        $blog->priority = $request->priority; 
        $blog->description = $request->description; 
        $blog->blog_date = $request->blog_post_date; 
        $blog->status = $request->status; 
        $blog->save();
        return redirect()->route('blogdetails.index')->with('success','Blog details update successfully');
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
            $filepath = public_path('assets/dynamics/blog/'.$blog->blog_image);
            
            if(file_exists($filepath)){
                unlink($filepath);
            }
         $blog->delete();
        }
        return redirect()->back()->with('success','Blog Details delete successfully');  
    }
}
