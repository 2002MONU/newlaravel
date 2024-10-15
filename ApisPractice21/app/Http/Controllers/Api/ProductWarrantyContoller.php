<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductWarranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductWarrantyContoller extends Controller
{
   public function productWarranty(Request $request){
        $validator = Validator::make($request->all(),[
            'category_id' => 'required|integer|exists:categories,id',
            'warranty_summry' =>'required',
            'warranty_service_type' => 'required',
            'warranty_covered' => 'required',
            'warranty_not_covered' => 'required',
            'warranty_domestic' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
             'status' => "Invalid",
             'message' => $validator->errors()->first()
            ]);
        }

        $warranty = ProductWarranty::create([
            'category_id' => $request->category_id,
            'warranty_summry' => $request->warranty_summry,
            'warranty_service_type' => $request->warranty_service_type,
            'warranty_covered' => $request->warranty_covered,
            'warranty_not_covered' => $request->warranty_not_covered,
            'warranty_domestic' => $request->warranty_domestic,
        ]);
        if($warranty){
            return response()->json([
                'status' => 'valid',
                'message' => 'Data add Successfully',
            ]);
        }else{
            return response()->json([
                'status' => "Invalid",
                'message' => $validator->errors()->first()
               ]);
        }
    }

    public function productAllDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]);
        }
    
        // Find the product by id with the correct joins
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('product_specifications', 'product_specifications.catogory_id', '=', 'categories.id')
            ->leftJoin('product_warranties','product_warranties.category_id','=','categories.id') // Join based on product_id
            ->leftJoin('product_offers','product_offers.category_id','=','categories.id') // Join based on product_id
            ->select(
                'categories.name as category_name',
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
                'product_specifications.compatible',
                'product_warranties.warranty_summry',
                'product_warranties.warranty_service_type',
                'product_warranties.warranty_covered',
                'product_warranties.warranty_not_covered',
                'product_warranties.warranty_domestic',
                'product_offers.offers',
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
}
