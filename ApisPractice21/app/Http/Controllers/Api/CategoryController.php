<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function category(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'=> 'invalid',
                'message' => $validate->errors()->first()
            ]);
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json([
            'status' => "Valid",
            'message' => 'Category add successfully',
        ]);
    }
}
