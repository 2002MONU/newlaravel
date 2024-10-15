<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SpecialCategory;
use App\SpecialProduct;
use Illuminate\Http\Request;

class SpecialCategoryController extends Controller
{
    public function index(){
        $special_product = SpecialCategory::join('spercial_product','spercial_product.special_cat_id','=','special_category.id')
                ->select('special_category.*','spercial_product.*')->get();
        return view('admin.special-category.index-category',compact('special_product'));
    }


    public function create(){
        $categories = SpecialCategory::get();
        return view('admin.special-category.add-category',compact('categories'));
    }
    
    public function  store(Request $request) {
                  $request->validate([
            'category' => 'required|string|max:255',
             'description'=>'required|string',
             'product_name'=>'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required',
           ]);

        $data = new SpecialProduct();
             if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/specialImage'), $name);
            $data->beadcumb_image = $name;
        }
       
    $data->special_cat_id = $request->input('category');
    $data->decription = $request->input('description');
    $data->product_name = $request->input('product_name');
    $data->status = $request->input('status');
   $data->save();
    return redirect()->route('admin.special-category')
            ->with('success', 'Added Successfully.');        
    }

    public function edit($id){
        $categories = SpecialCategory::get();
        $product = SpecialProduct::find($id);
        return view('admin.special-category.edit-category',compact('categories','product'));
    }

    public function update(Request $request ,$id){
        $request->validate([
            'category' => 'required|string|max:255',
             'description'=>'required|string',
             'product_name'=>'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'status'=>'required|in:0,1',
           ]);

        $data =  SpecialProduct::find($id);
             if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/specialImage'), $name);
            $data->beadcumb_image = $name;
        }
       
    $data->special_cat_id = $request->input('category');
    $data->decription = $request->input('description');
    $data->product_name = $request->input('product_name');
    $data->status = $request->input('status');
   $data->save();
    return redirect()->route('admin.special-category')
            ->with('success', 'Added Successfully.');
    }

    public function delete($id){
        SpecialProduct::find($id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
