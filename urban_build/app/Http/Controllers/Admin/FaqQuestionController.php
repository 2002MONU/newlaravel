<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = FaqQuestion::get();
        return view('admin.faqs.faqs-details',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.add-faqs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|min:1|unique:faq_questions,priority',
        ]);

        $faq = new FaqQuestion();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->priority = $request->priority;
        $faq->save();
        return redirect()->route('faq-questions.index')->with('success','Faqs added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = FaqQuestion::find($id);
        return view('admin.faqs.edit-faqs',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'status' => 'required|in:0,1',
            'priority' => 'required|integer|min:1|unique:faq_questions,priority,'.$id,
        ]);

        $faq =  FaqQuestion::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->priority = $request->priority;
        $faq->save();
        return redirect()->route('faq-questions.index')->with('success','Faqs added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FaqQuestion::find($id)->delete();
        return redirect()->back()->with('success','Faqs deleted successfully');
    }
}
