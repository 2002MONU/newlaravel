<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required|string|max:255|unique:products,title',
            'short_description' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required|boolean',
            'category' => 'required',
           'priority' => 'required|integer|unique:products,priority',
            'soluable_concentrate' => 'required|string|max:255',
            'features' => 'required|string',
            'specification' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $product = new Product();
    
        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/productImage'), $name);
            $product->image = $name;
        }
    
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->short_description = $request->input('short_description');
        $product->phone = $request->input('phone');
        $product->whatsapp = $request->input('whatsapp');
        $product->status = $request->input('status');
        $product->category_id = $request->input('category');
        $product->priority = $request->input('priority');
        $product->soluable_concentrate = $request->input('soluable_concentrate');
        $product->features = $request->input('features');
        $product->specification = $request->input('specification');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $product->meta_description = $request->input('meta_description');
    
        $product->save();
    
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'status' => 'required|boolean',
            'category' => 'required',
         'priority' => [
    'required',
    'integer',
    Rule::unique('products', 'priority')->ignore($id)
],

            'soluable_concentrate' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'specification' => 'nullable|string',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);

        $product->fill($request->all());

        if ($request->hasFile('image')) {
            $img_extension = $request->file('image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('image')->move(public_path('admin/productImage'), $name);
            $product->image = $name;
        }
    
        $product->title = $request->input('title');
        $product->slug = Str::slug($request->input('title'));
        $product->short_description = $request->input('short_description');
        $product->phone = $request->input('phone');
        $product->whatsapp = $request->input('whatsapp');
        $product->status = $request->input('status');
        $product->category_id = $request->input('category');
        $product->priority = $request->input('priority');
        $product->soluable_concentrate = $request->input('soluable_concentrate');
        $product->features = $request->input('features');
        $product->specification = $request->input('specification');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $product->meta_description = $request->input('meta_description');

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            $imagePath = public_path('/admin/productImage/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
