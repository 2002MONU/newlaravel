<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index', compact('category'));

    }
   
    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([
           'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120',
             'breadcrumb' => 'image|mimes:jpeg,jpg,png|max:5120',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required',
           
           
        ]);

        $data = Category::where('id',$id)->first();


        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/categoryImage'), $name);
            $data->image = $name;
        }
         if ($request->hasFile('breadcrumb')) {
            $img_extension1 = $request->file('breadcrumb')->getClientOriginalExtension();
            $name1 = time() . '.' . $img_extension1;
            $pathimage1 = $request->file('breadcrumb')->move(public_path('admin/categoryImage'), $name1);
            $data->image_2 = $name1;
        }
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));
        $data->description = $request->input('description');
        $data->meta_title = $request->input('meta_title');
        $data->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $data->meta_description = $request->input('meta_description');
       
    


        $data->save();



        return redirect()->route('admin.category.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
}
