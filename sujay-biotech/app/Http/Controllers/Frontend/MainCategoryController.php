<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
   public function index($slug)
   {
    $categories = Category::where('slug',$slug)->first();
    $products = $categories->products()
                             ->where('status', 1) // Ensure the product status is 1
                             ->orderByDesc('priority') // Order products by priority
                             ->paginate(6); 
    
        $meta_title=$categories->meta_title;
        $meta_keywords=implode(",", json_decode($categories->meta_keywords));
        $meta_description= $categories->meta_description;
    return view('frontend.category', compact('categories','products','meta_title','meta_keywords','meta_description'));
  
    }
}
