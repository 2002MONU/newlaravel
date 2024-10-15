<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryFrontendController extends Controller
{
    public function gallery(){
        $galleries = Gallery::where('status',1)->orderBy('priority','asc')->get();
        return view('frontend.gallery',compact('galleries'));
    }

    public function getImages($id)
    {
        $gallery = Gallery::find($id);
    
        if (!$gallery) {
            return response()->json(['error' => 'Gallery not found'], 404);
        }
    
        $images = json_decode($gallery->image, true);
    
        if (!$images) {
            return response()->json(['error' => 'No images found'], 404);
        }
    
        return response()->json(['images' => $images]);
    }
    

}
