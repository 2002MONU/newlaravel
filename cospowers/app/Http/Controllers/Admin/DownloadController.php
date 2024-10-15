<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Download::get();
        return view('admin.downloads.downloads-details',compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.downloads.add-downloads');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf,doc,docx|max:5212',
            'title' =>'required|string',
            'priority' =>'required|integer|unique:downloads,priority',
            'status' =>'required|in:0,1',
        ]);
        
        $downloads =new Download();
          if ($request->hasFile('pdf')) {
            $filename = (time() + 1) . '.' . $request->file('pdf')->getClientOriginalExtension();
            $filepath = $request->file('pdf')->move(public_path('assets/dynamics'), $filename);
        
           // Remove the old PDF if it exists
//            $oldPdfPath = public_path('assets/dynamics/' . $downloads->pdf);
//            if (file_exists($oldPdfPath) && !is_dir($oldPdfPath)) {
//                unlink($oldPdfPath);
//            }
        
            $downloads->pdf = $filename;
        }
        
        $downloads->title = $request->title;
        $downloads->priority = $request->priority;
        $downloads->status = $request->status;
        $downloads->save();
        
        return redirect()->route('downloads.index')->with('success', 'Download details add successfully');
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
        $download = Download::find($id);
        return view('admin.downloads.edit-downloads',compact('download'));
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
            'pdf' => 'nullable|file|mimes:pdf,doc,docx|max:5212',
            'title' =>'required|string',
            'priority' =>'required|integer|unique:downloads,priority,'.$id,
            'status' =>'required|in:0,1',
        ]);
        
        $downloads = Download::find($id);
          if ($request->hasFile('pdf')) {
            $filename = (time() + 1) . '.' . $request->file('pdf')->getClientOriginalExtension();
            $filepath = $request->file('pdf')->move(public_path('assets/dynamics'), $filename);
        
           // Remove the old PDF if it exists
            $oldPdfPath = public_path('assets/dynamics/' . $downloads->pdf);
            if (file_exists($oldPdfPath) && !is_dir($oldPdfPath)) {
                unlink($oldPdfPath);
            }
        
            $downloads->pdf = $filename;
        }
        
        $downloads->title = $request->title;
        $downloads->priority = $request->priority;
        $downloads->status = $request->status;
        $downloads->save();
        
        return redirect()->route('downloads.index')->with('success', 'Download details add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Download::find($id);
        if($download){
            // Remove the old PDF if it exists
            $oldPdfPath = public_path('assets/dynamics/' . $download->pdf);
            if (file_exists($oldPdfPath) && !is_dir($oldPdfPath)) {
                unlink($oldPdfPath);
            }
        
        }
        $download->delete();
        return redirect()->back()->with('success','Downloads delete successfully');
    }
}
