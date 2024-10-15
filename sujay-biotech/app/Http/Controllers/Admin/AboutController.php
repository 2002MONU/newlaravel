<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index(){

        $aboutus = About::get();
            // return $state;
            return view('admin.aboutus.index',compact('aboutus'));
        
       }
       public function update(Request $request, $id)
       {
           $request->validate([
               'title' => 'required',
               'image' => 'image|mimes:jpeg,jpg,png|max:5120',
               'description' => 'required|string', 
               'image_two' => 'image|mimes:jpeg,jpg,png|max:5120',
               'meta_title' => 'required|string|max:255',
               'meta_keywords' => 'required|string|max:255',
               'meta_description' => 'required|string',
               'mission'=>'required|string',
               'vision'=>'required|string',
           ]);
       
           $data = About::find($id);
       
      
               if ($request->hasFile('image')) {
                   $img_extension = $request->file('image')->getClientOriginalExtension();
                   $name = time() . '_image.' . $img_extension;
                   $pathimage = $request->file('image')->move(public_path('admin/aboutImage'), $name);
                   $data->image = $name;
               }
       
               if ($request->hasFile('image_two')) {
                   $img_extension = $request->file('image_two')->getClientOriginalExtension();
                   $name = (time() + 1) . '_image_two.' . $img_extension; 
                   $pathimage = $request->file('image_two')->move(public_path('admin/aboutImage'), $name);
                   $data->image_2 = $name;
               }
       
              
       
               $data->title = $request->input('title');
               $data->description = $request->input('description');
               $data->meta_title = $request->input('meta_title');
               $data->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
               $data->meta_description = $request->input('meta_description');
               $data->mission = $request->input('mission');
               $data->vision = $request->input('vision');
       
               $data->save();
       
               return redirect()->route('admin.aboutus.index')->with('success','Updated Successfully.');
          
       }

public function edit($id)
    {
        $aboutus = About::findOrFail($id);
        return view('admin.aboutus.edit', compact('aboutus'));
    }
        

}
