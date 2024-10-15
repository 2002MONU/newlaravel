<?php

namespace App\Http\Controllers\Admin;


use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index(){

        $about = About::get();
            // return $state;
            return view('admin.about.index',compact('about'));
        
       }
    public function update(Request $request,$id)
    {

      // return $request;
       $request->validate([
        'title' => 'required|string|max:255',
        'short_description' => 'required|string',
        'image' => 'image|mimes:jpeg,jpg,png|max:5120',
       'description' => 'required|string',
       'title_1' => 'required|string|max:255',
       'short_description_1' => 'required|string',
       'title_2' => 'required|string|max:255',
       'short_description_2' => 'required|string',
       'title_3' => 'required|string|max:255',
       'short_description_3' => 'required|string',
       'year_of_exprience' => 'required|string',
    ]);
 
        $data= About::find($id);
         if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/aboutImage'), $name);
            $data->image= $name;
        } 
        if ($request->hasFile('image_2')) {
            $img_extension = $request->file('image_2')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image_2')->move(public_path('admin/aboutImage'), $name);
            $data->image_2= $name;
        } 

 
        $data->title = $request->input('title');
        $data->short_description = $request->input('short_description');
        $data->description = $request->input('description');
        $data->year_of_exprience = $request->input('year_of_exprience');
        
        $data->title_1 = $request->input('title_1');
        $data->short_description_1 = $request->input('short_description_1');

        $data->title_2 = $request->input('title_2');
        $data->short_description_2 = $request->input('short_description_2');
        
        $data->title_3 = $request->input('title_3');
        $data->short_description_3 = $request->input('short_description_3');
        $data->save();

        return redirect()->route('abouts.index')
                        ->with('success','Updated Successfully.');
    }


public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }
}
