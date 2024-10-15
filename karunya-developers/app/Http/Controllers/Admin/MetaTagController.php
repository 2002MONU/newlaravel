<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta_tags = MetaTag::find(1);
        return view('admin.setting.meta-tags',compact('meta_tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meta_tags = \App\Models\MetaTag::find($id);
        return view('admin.setting.edit-meta-tags',compact('meta_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'og_description' => 'nullable|string',
            'author' => 'nullable|string',
            'canonical' => 'nullable|string',
            'og_secure_url' => 'nullable|string',
            'width' => 'nullable|string',
            'height' => 'nullable|string',
            'og_image' => 'nullable|image|max:1024',
            'og_site_name' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_url' => 'nullable|string',
            'og_type' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'twitter_type' => 'nullable|string',
            'twitter_site' => 'nullable|string',
            'twitter_creator' => 'nullable|string',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image|max:1024',
        ]);

        $meta_tags = \App\Models\MetaTag::find($id);
        if($request->hasFile('og_image')){
            $filename = $request->file('og_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('og_image')->move(public_path('assets/dynamics'),$name);
            $meta_tags->og_image = $name;
        }
        if($request->hasFile('twitter_image')){
            $filename = $request->file('twitter_image')->getClientOriginalExtension();
            $name = time().'.'.$filename;
            $filepath = $request->file('twitter_image')->move(public_path('assets/dynamics'),$name);
            $meta_tags->twitter_image = $name;
        }

        $meta_tags->og_description = $request->og_description;
        $meta_tags->author = $request->author;
        $meta_tags->canonical = $request->canonical;
        $meta_tags->og_secure_url = $request->og_secure_url;
        $meta_tags->width = $request->width;
        $meta_tags->height = $request->height;
        $meta_tags->og_site_name = $request->og_site_name;
        $meta_tags->og_title = $request->og_title;
        $meta_tags->og_url = $request->og_url;
        $meta_tags->og_type = $request->og_type;
        $meta_tags->twitter_card = $request->twitter_card;
        $meta_tags->twitter_type = $request->twitter_type;
        $meta_tags->twitter_site = $request->twitter_site;
        $meta_tags->twitter_creator = $request->twitter_creator;
        $meta_tags->twitter_title = $request->twitter_title;
        $meta_tags->twitter_description = $request->twitter_description;
        $meta_tags->save();
        return redirect()->route('metatags.index')->with('success','Meta tags edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
