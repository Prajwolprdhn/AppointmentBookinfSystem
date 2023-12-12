<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    private $faq;
    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = $this->faq->get();
        return view('admin.tables.faq', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.add_faq');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formfields = $request;
        Faq::create($formfields->all());
        Alert::success('Success!', 'FAQ Created Sucessfully!');
        return redirect()->route('faq.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.forms.edit_faq', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formFields = $request;
        $data = Faq::findOrFail($id);
        $data->update($formFields->all());
        Alert::success('Success!', 'FAQ Edited Sucessfully!');
        return redirect()->route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        Alert::success('Success!', 'Question Deleted Sucessfully!');
        return redirect()->back();
    }
}
