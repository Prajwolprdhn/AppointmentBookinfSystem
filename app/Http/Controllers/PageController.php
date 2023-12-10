<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.tables.page_management', compact('pages'));
    }

    public function dynamic($id)
    {
        $page_id = $id;
        $data = Page::findOrFail($id);
        return view('users.dynamic_view', compact('data', 'page_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.add_page');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        // dd($request);
        $pageValidated = $request->validated();
        // dd($pageValidated);
        Page::create([
            'title' => [
                'en' => $pageValidated['title_en'],
                'np' => $pageValidated['title_np'],
            ],
            'content' => [
                'en' => $pageValidated['content_en'],
                'np' => $pageValidated['content_np'],
            ],
            'slug' => $pageValidated['slug'],
        ]);
        Alert::success('Success!', 'Page Created Successfully!');

        return redirect()->route('page.index');
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
        $page = Page::findOrFail($id);
        return view('admin.forms.edit_page', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        $formfields = $request->validated();
        $data = Page::findOrFail($id);
        // dd($formfields);
        $data->update([
            'title' => [
                'en' => $formfields['title_en'],
                'np' => $formfields['title_np'],
            ],
            'content' => [
                'en' => $formfields['content_en'],
                'np' => $formfields['content_np'],
            ],
            'slug' => $formfields['slug'],
        ]);
        Alert::success('Success!', 'Page Updated Sucessfully!');
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        Alert::success('Success!', 'Page Deleted Sucessfully!');
        return redirect()->back();
    }
}
