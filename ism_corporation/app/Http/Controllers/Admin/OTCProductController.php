<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OTCProduct;
use Illuminate\Http\Request;

class OTCProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otc_products = OTCProduct::get();
        return view('admin.otcproduct.otc-product-details',compact('otc_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.otcproduct.add-otc-product');
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
            'name' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:o_t_c_products,priority',
            'status' => 'required|in:0,1',
            'image' => 'required|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'back_image' => 'required|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'icon' => 'required|string',
        ]);

        $otc_products = new  OTCProduct();
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/product'),$name);
           $otc_products->image = $name;
        }
        if($request->hasFile('back_image')){
            $filename1 = $request->file('back_image')->getClientOriginalExtension();
            $name1 = (time()+1).'.'.$filename1;
            $filepath1 = $request->file('back_image')->move(public_path('assets/dynamics/product'),$name1);
           $otc_products->back_image = $name1;
        }
       
        $otc_products->name = $request->name;
        $otc_products->icon = $request->icon;
        $otc_products->description = $request->description;
        $otc_products->priority = $request->priority;
        $otc_products->status = $request->status;
        $otc_products->save();
        return redirect()->route('otcproducts.index')->with('success','Otc product add successfully');

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
        $product = OTCProduct::find($id);
        return view('admin.otcproduct.edit-otc-product',compact('product'));
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
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|integer|unique:o_t_c_products,priority,'.$id,
            'status' => 'required|in:0,1',
            'image' => 'nullable|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'back_image' => 'nullable|image|mimes:png,jpeg,jpeg,webp|max:2048',
            'icon' => 'nullable|string',
        ]);

        $otc_products =   OTCProduct::find($id);
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics/product'),$name);
            $imagePath1 = public_path('assets/dynamics/product/' . $otc_products->image);
            if (file_exists($imagePath1)) {
               // Delete the  image
               unlink($imagePath1);
           }
            $otc_products->image = $name;
        }
        // product icon
        if($request->hasFile('back_image')){
            $filename1 = $request->file('back_image')->getClientOriginalExtension();
            $name1 = (time()+1).'.'.$filename1;
            $filepath1 = $request->file('back_image')->move(public_path('assets/dynamics/product'),$name1);
            $imagePath1 = public_path('assets/dynamics/product/' . $otc_products->back_image);
            if (file_exists($imagePath1)) {
               // Delete the  image
               unlink($imagePath1);
           }
            $otc_products->back_image = $name1;
        }
        $otc_products->name = $request->name;
        $otc_products->icon = $request->icon;
        $otc_products->description = $request->description;
        $otc_products->priority = $request->priority;
        $otc_products->status = $request->status;
        $otc_products->save();
        return redirect()->route('otcproducts.index')->with('success','Otc product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = OTCProduct::where('id', $id)->first();
        if ($product)
        {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/product/' . $product->image);
             if (file_exists($imagePath1)) 
            {
                // Delete the  image
                unlink($imagePath1);
            }
          $product->delete();
           return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
}
