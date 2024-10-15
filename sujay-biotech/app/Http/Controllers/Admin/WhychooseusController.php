<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Whychooseus;
use Illuminate\Http\Request;

class WhychooseusController extends Controller
{
    function index(){

        $data = Whychooseus::find(1);
            // return $state;
            return view('admin.whychooseus.index',compact('data'));
        
       }
       public function update(Request $request, $id)
       {
           $request->validate([
               'title' => 'required',
               'image' => 'image|mimes:jpeg,jpg,png|max:5120',
               'title_2' => 'required',
               'image_2' => 'image|mimes:jpeg,jpg,png|max:5120',
               'title_3' => 'required',
               'image_3' => 'image|mimes:jpeg,jpg,png|max:5120',
              
           ]);
       
           $data = Whychooseus::find($id);
       
      
               if ($request->hasFile('image')) {
                   $img_extension = $request->file('image')->getClientOriginalExtension();
                   $name = time() . '_image.' . $img_extension;
                   $pathimage = $request->file('image')->move(public_path('admin/whychooseusImage'), $name);
                   $data->image = $name;
               }
       
               if ($request->hasFile('image_2')) {
                   $img_extension = $request->file('image_2')->getClientOriginalExtension();
                   $name = (time() + 1) . '_image_2.' . $img_extension; 
                   $pathimage = $request->file('image_2')->move(public_path('admin/whychooseusImage'), $name);
                   $data->image_2 = $name;
               }
               if ($request->hasFile('image_3')) {
                $img_extension = $request->file('image_3')->getClientOriginalExtension();
                $name = (time() + 1) . '_image_3.' . $img_extension; 
                $pathimage = $request->file('image_3')->move(public_path('admin/whychooseusImage'), $name);
                $data->image_3 = $name;
            }
       
              
       
               $data->title = $request->input('title');
               $data->title = $request->input('title_2');
               $data->title = $request->input('title_3');

               $data->save();
       
               return redirect()->route('admin.whychooseus.index');
          
       }

public function edit($id)
    {
        $whychooseus = Whychooseus::findOrFail($id);
        return view('admin.whychooseus.edit', compact('whychooseus'));
    }
        
}
