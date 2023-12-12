<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    private $feedbacks;
    public function __construct(Feedback $feedbacks)
    {
        $this->feedbacks = $feedbacks;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = $this->feedbacks->get();
        return view('admin.tables.feedbacks', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.layouts.feedbacks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $formfields = $request;
        Feedback::create($formfields->all());
        Alert::success('Success!', 'Message Sent Sucessfully!');
        return redirect()->route('feedback.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return view('admin.view.feedback_view', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        Alert::success('Success!', 'Feedback Deleted Sucessfully!');
        return redirect()->back();
    }
}