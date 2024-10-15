<?php

namespace App\Http\Controllers\Frontend;

use App\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Seo;
use App\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
   public function index($slug){
    $product = Product::where('slug', $slug)->firstOrFail();
    // Fetch related products, this could be based on category or any other logic
    $relatedProducts = Product::where('category_id', $product->category_id)->where('slug', '!=',$slug)->get();
    $meta_title= $product->meta_title;
    $meta_keywords=implode(",", json_decode($product->meta_keywords));
    $meta_description= $product->meta_description;
   return view('frontend.productdetail',compact('relatedProducts','product'));
 
        
   }
   public function product() {
    $products = Product::paginate(6); // Paginate with 10 products per page
      $seo = Seo::where('page_name','product')->first();
        $meta_title=$seo->meta_title;
        $meta_keywords=implode(",", json_decode($seo->meta_keywords));
        $meta_description= $seo->meta_description;
        $breadcrumb = Breadcrumb::where('page_name','product')->first();
    return view('frontend.product', compact('products','meta_title','meta_keywords','meta_description','breadcrumb'));
}


}
