<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowItWork;
use Illuminate\Http\Request;

class HowItWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $howit_work = HowItWork::find(1);
        return view('admin.homepage.howit-work-details',compact('howit_work'));
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
        $howit_work = HowItWork::find($id);
        return view('admin.homepage.edit-howit-works',compact('howit_work'));
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
        'book_online' => 'required|string',
        'get_confirmation' => 'required|string',
        'let_enjoy' => 'required|string',
       ]);
       $howit_work = HowItWork::find($id);
       $howit_work->book_online = $request->book_online;
       $howit_work->get_confirmation = $request->get_confirmation;
       $howit_work->let_enjoy = $request->let_enjoy;
       $howit_work->save();
       return redirect()->route('howitworks.index')->with('success','How it works update successfully');
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
