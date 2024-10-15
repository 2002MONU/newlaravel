<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    function index()
    {

        $seo = Seo::get();
        // return $state;
        return view('admin.seo.index', compact('seo'));

    }
    public function update(Request $request, $id)
    {

        // return $request;
        $request->validate([

            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required',


        ]);

        $data = Seo::find($id);




        $data->meta_title = $request->input('meta_title');
        $data->meta_keywords = json_encode(array_map('trim', explode("\n", $request->meta_keywords)));
        $data->meta_description = $request->input('meta_description');


        $data->save();

        return redirect()->route('admin.seo.index')
            ->with('success', 'Updated Successfully.');
    }


    public function edit($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seo.edit', compact('seo'));
    }
}


