<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSpecification;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductController extends Controller
{
    // add product 

    public function product(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'selling_price' => 'required|integer',
                'product_image' => 'nullable|image|mimes:png,jpg,jpeg',
                'mrp_price' => 'required|integer',
                'discount' => 'required|integer',
                'description' => 'required|string',
                'status' => 'required|integer|in:0,1',
                'category_id' => 'required|integer|exists:categories,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'Invalid',
                    'message' => $validator->errors()->first()
                ]);
            }

            if ($request->hasFile('product_image')) {
                $filename = $request->file('product_image')->getClientOriginalExtension();
                $imageName = time() . rand(100, 999) . '.' . $filename;
                $imgPAth = $request->file('product_image')->move(public_path('website/image'), $imageName);
            }
            $product = Product::create([
                'selling_price' => $request->selling_price,
                'product_image' => $imageName,
                'mrp_price' => $request->mrp_price,
                'discount' => $request->discount,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id,

            ]);

            if ($product) {

                return response()->json([
                    'status' => 'Valid',
                    'message' => 'Product data add successfully',

                ]);
            }
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'Error',
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function productData()
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.name',
                'products.id',
                'products.selling_price',
                'products.product_image',
                'products.mrp_price',
                'products.discount',
                'products.description',
                'products.status',
                'products.category_id',
            )->get();

        if ($product) {
            return response()->json([
                $product
            ]);
        } else {
            return response()->json([
                'status' => 'invalid',
                'message' => 'no data found'
            ]);
        }
    }

    public function productSingle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]);
        }

        // Find the product by id
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.name',
                'products.id',
                'products.selling_price',
                'products.product_image',
                'products.mrp_price',
                'products.discount',
                'products.description',
                'products.status',
                'products.category_id'
            )
            ->where('products.id', $request->id) // Filter by the requested id
            ->first();

        if ($product) {
            return response()->json([
                'status' => 'success',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'invalid',
                'message' => 'No data found'
            ]);
        }
    }


    public function productSpecification(Request $request){
          $validator = Validator::make($request->all(),[
            'catogory_id' =>'required|integer|exists:categories,id',
            'brand' => 'required|string|max:50',
            'model_number' => 'required',
            'lens_type' => 'required',
            'color' => 'required',
            'compatible' => 'required',
          ]);

          if($validator->fails()){
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first(),
            ]);
          }

          $productSpecification = ProductSpecification::create([
            'catogory_id' => $request->catogory_id, 
            'brand' => $request->brand, 
            'model_number' => $request->model_number, 
            'lens_type' => $request->lens_type, 
            'color' => $request->color, 
            'compatible' => $request->compatible, 
          ]);

          return response()->json([
            'status' => 'Valid',
            'message' => "Product Specification"
          ]);
    }


    public function productDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:products,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]);
        }
    
        // Find the product by id with the correct joins
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('product_specifications', 'product_specifications.catogory_id', '=', 'categories.id') // Join based on product_id
            ->select(
                'categories.name as category_name',
                'products.id',
                'products.selling_price',
                'products.product_image',
                'products.mrp_price',
                'products.discount',
                'products.description',
                'products.status',
                'products.category_id',
                'product_specifications.brand',
                'product_specifications.model_number',
                'product_specifications.lens_type',
                'product_specifications.color',
                'product_specifications.compatible'
            )
            ->where('categories.id', $request->id) // Filter by the requested id
            ->first();
    
        if ($product) {
            return response()->json([
                'status' => 'success',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'invalid',
                'message' => 'No data found'
            ]);
        }
    }
    
    public function productDelete(Request $request){
        // Validate the request
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:categories,id',
        ]);
        
        // Return validation error if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]); 
        }
    
        // Find the category by ID
        $category = Category::find($request->id);
    
        // Check if category exists
        if (!$category) {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'Category not found'
            ]); 
        }
    
        // Fetch all products related to the category
        $products = Product::where('category_id', $category->id)->get();
    
        // Loop through each product to delete both the product and its specifications
        foreach ($products as $product) {
            // Delete product specifications related to this product
            ProductSpecification::where('catogory_id', $product->id)->delete();
            
            // Delete the product itself
            $product->delete();
        }
    
        // Optionally, you can delete the category itself if needed
         $category->delete();
    
        return response()->json([
            'status' => 'Success',
            'message' => 'Products and their specifications have been deleted successfully'
        ]);
    }
    
    
    
}
