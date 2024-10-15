<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductOfferContoller extends Controller
{
    //

    public function productOffers(Request $request) {
        $validator = Validator::make($request->all(),[
            'category_id' => 'required|integer|exists:categories,id',
            'offers' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'Invalid',
                'message' => $validator->errors()->first()
            ]); 
        }
    
        $product_offer = ProductOffer::create([
            'category_id' => $request->category_id,
            'offers' => $request->offers,
        ]);
    
        if($product_offer){
            return response()->json([
                'status' => 'valid',
                'message' => 'Data added successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'Invalid',
                'message' => 'Failed to add data',
            ]);
        }
    }
    
}
