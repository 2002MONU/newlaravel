<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Breadcrumb;
use Illuminate\Http\Request;

class BreadcrumbController extends Controller
{
    
    public function index()
    {
        $breadcrumb = Breadcrumb::get();
        return view('admin.breadcrumb.index', compact('breadcrumb'));

    }
   
    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
          
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
            
           
           
        ]);

        $data = Breadcrumb::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/breadcrumbImage'), $name);
            $data->image = $name;
        }
         
    


        $data->save();



        return redirect()->route('admin.breadcrumb.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $breadcrumb = Breadcrumb::find($id);
        return view('admin.breadcrumb.edit',compact('breadcrumb'));
    }
}
