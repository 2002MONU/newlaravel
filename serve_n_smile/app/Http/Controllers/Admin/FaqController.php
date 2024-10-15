<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::join('services','services.id','=','faqs.service_id')->select('services.title','faqs.*')->get();
        return view('admin.faqs.faqs-details',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::where('status',1)->get();
        return view('admin.faqs.add-faqs',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'status' => 'required|in:0,1',
        'service' => 'required',
        'question' => 'required|array',
        'question.*' => 'required|string',
        'answer' => 'required|array',
        'answer.*' => 'required|string',
    ]);

    // Loop through each question and answer to save them as individual FAQs
    foreach ($request->question as $key => $question) {
        $faq = new Faq();
        $faq->service_id = $request->service;
        $faq->status = $request->status;
        $faq->question = $question;
        $faq->answer = $request->answer[$key];
        $faq->save();
    }

    // Redirect back to the FAQ index with a success message
    return redirect()->route('faqs.index')->with('success', 'Faq questions added successfully');
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
    public function edit($service_id)
{
    // Fetch the FAQs for the given service_id
    $faqs = Faq::where('service_id', $service_id)->get();
    $services = Service::where('status', 1)->get();

    return view('admin.faqs.edit-faqs', compact('faqs', 'services'));
}

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_id)
{
    $request->validate([
        'status' => 'required|in:0,1',
        'service' => 'required',
        'question' => 'required|array',
        'question.*' => 'required|string',
        'answer' => 'required|array',
        'answer.*' => 'required|string',
    ]);

    // Fetch existing FAQs for the service_id
    $existingFaqs = Faq::where('service_id', $service_id)->get();
    $existingFaqIds = $existingFaqs->pluck('id')->toArray();

    // Loop through each question and answer to save or update them
    foreach ($request->question as $key => $question) {
        $faq = Faq::find($existingFaqIds[$key] ?? null);

        if (!$faq) {
            // Create a new FAQ if it doesn't exist
            $faq = new Faq();
        }

        $faq->service_id = $request->service;
        $faq->status = $request->status;
        $faq->question = $question;
        $faq->answer = $request->answer[$key];
        $faq->save();

        // Remove the ID from the list of existing FAQ IDs to track which were updated
        if (($key = array_search($faq->id, $existingFaqIds)) !== false) {
            unset($existingFaqIds[$key]);
        }
    }

    // Delete any remaining FAQs that were not updated
    Faq::whereIn('id', $existingFaqIds)->delete();

    // Redirect back to the FAQ index with a success message
    return redirect()->route('faqs.index')->with('success', 'Faq questions updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();
        return redirect()->back()->with('success','Faq question delete successfully');
    }
}
