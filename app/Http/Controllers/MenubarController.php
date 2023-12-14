<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Menubar;
use App\Models\Modules;
use Illuminate\Http\Request;
use App\Http\Requests\MenubarRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MenubarController extends Controller
{
    private $menubar;
    public function __construct(Menubar $menubar)
    {
        $this->menubar = $menubar;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = $this->menubar->get();
        // dd($menus);
        return view('admin.tables.menubar', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Modules::all();
        $pages = Page::all();
        $menus = $this->menubar->get();
        return view('admin.forms.add_menubar', compact('modules', 'pages', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenubarRequest $request)
    {
        // dd($request);
        $formfields = $request;
        $formFields['status'] = $request->has('status') ? 1 : 0;

        Menubar::create($formfields->all());
        Alert::success('Success!', 'Menu Created Sucessfully!');
        return redirect()->route('menubar.index');
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
        $menu = Menubar::findOrFail($id);
        $modules = Modules::all();
        $pages = Page::all();
        $menus = $this->menubar->get();
        return view('admin.forms.edit_menubar', compact('modules', 'pages', 'menu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formFields = $request;
        $data = Menubar::findOrFail($id);
        $data->update($formFields->all());
        Alert::success('Success!', 'Menu Edited Sucessfully!');
        return redirect()->route('menubar.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Menubar $menubar)
    {
        $menubar->delete();
        Alert::success('Success!', 'Menu Deleted Sucessfully!');
        return redirect()->back();
    }
}
