<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SpecialProduct;
use App\SpecialSubProduct;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SpecialSubCategoryController extends Controller
{
    public function index()
    {
        $products = SpecialSubProduct::join('spercial_product', 'spercial_product.id', '=', 'special_sub_product.special_product_id')
    ->select('spercial_product.*', 'special_sub_product.*')
    ->get();

        return view('admin.special-sub-product.index',compact('products'));
    }

    public function create()
    {
        $categories = SpecialProduct::all();
        return view('admin.special-sub-product.add', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required|string|max:255|unique:special_sub_product,title',
            'short_description' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required|boolean',
            'category' => 'required',
           'priority' => 'required|integer|unique:special_sub_product,priority',
            'soluable_concentrate' => 'required|string|max:255',
            'features' => 'required|string',
            'specification' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $product = new SpecialSubProduct();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/specialImage'), $name);
            $product->image = $name;
        }
    
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->short_description = $request->input('short_description');
        $product->phone = $request->input('phone');
        $product->whatsapps = $request->input('whatsapp');
        $product->status = $request->input('status');
        $product->special_product_id = $request->input('category');
        $product->priority = $request->input('priority');
        $product->soluable_concentrate = $request->input('soluable_concentrate');
        $product->features = $request->input('features');
        $product->specification = $request->input('specification');
        $product->meta_tite = $request->input('meta_title');
        $product->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $product->meta_description = $request->input('meta_description');
    
        $product->save();
    
        return redirect()->route('admin.special-sub-category')->with('success', 'Product added successfully.');
    }
    
    public function edit($id)
    {
        $product = SpecialSubProduct::findOrFail($id);
        $categories = SpecialProduct::all();
        return view('admin.special-sub-product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:special_sub_product,title,'.$id,
            'short_description' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required|boolean',
            'category' => 'required',
         'priority' => [
    'required',
    'integer',
    Rule::unique('special_sub_product', 'priority')->ignore($id)
],

            'soluable_concentrate' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'specification' => 'nullable|string',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $product = SpecialSubProduct::findOrFail($id);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/specialImage'), $name);
            $product->image = $name;
        }
    
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->short_description = $request->input('short_description');
        $product->phone = $request->input('phone');
        $product->whatsapps = $request->input('whatsapp');
        $product->status = $request->input('status');
        $product->special_product_id = $request->input('category');
        $product->priority = $request->input('priority');
        $product->soluable_concentrate = $request->input('soluable_concentrate');
        $product->features = $request->input('features');
        $product->specification = $request->input('specification');
        $product->meta_tite = $request->input('meta_title');
        $product->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $product->meta_description = $request->input('meta_description');

        $product->save();

        return redirect()->route('admin.special-sub-category')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = SpecialSubProduct::findOrFail($id);
        if ($product->image) {
            $imagePath = public_path('/admin/specialImage/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();

        return redirect()->route('admin.special-sub-category')->with('success', 'Product deleted successfully.');
    }
}
