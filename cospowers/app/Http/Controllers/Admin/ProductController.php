<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.products.product-details',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add-product');
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
            'title' => 'required|string|unique:products,title',
             'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:products,priority',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $product = new Product();
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $product->image = $name;
        }

        if($request->hasFile('home_image')){
            $filename = $request->file('home_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('home_image')->move(public_path('assets/dynamics'),$name);
            $product->home_image = $name;
        }
         
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->status = $request->status;
        $product->priority = $request->priority;
        $product->save();
        return redirect()->route('products.index')->with('success','Product add successfully');
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
        
        $products = Product::find($id);
        return view('admin.products.edit-product',compact('products'));
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
            'title' => 'required|string|unique:products,title,'.$id,
             'description' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|unique:products,priority,'.$id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
           
        ]);
        $product =  Product::find($id);
        // service image small 
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $product->image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $product->image = $name;
        }

        if($request->hasFile('home_image')){
            $filename = $request->file('home_image')->getClientOriginalExtension();
            $name = (time()+1).'.'.$filename;
            $filepath = $request->file('home_image')->move(public_path('assets/dynamics'),$name);
            $oldImagePath2 = public_path('assets/dynamics/' . $product->home_image);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
            $product->home_image = $name;
        }
         
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->status = $request->status;
        $product->priority = $request->priority;
        $product->save();
        return redirect()->route('products.index')->with('success','Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        if($product){
            $oldImagePath2 = public_path('assets/dynamics/' . $product->image);
           
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
           
            $product->delete();
            return redirect()->back()->with('success','Product details  delete with image successfully');
        }else{
            return redirect()->back()->with('error','Product Image does not found successfully');
        }
    }
}
