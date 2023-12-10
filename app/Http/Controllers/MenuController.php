<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.tables.menu_list', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.add_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formfields = $request;
        $formFields['menu_status'] = $request->has('status') ? 1 : 0;

        Menu::create($formfields->all());
        Alert::success('Success!', 'Menu Created Sucessfully!');
        return redirect()->route('menu.index');
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

        $menu = Menu::findOrFail($id);
        return view('admin.forms.edit_menu', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formfields = $request;
        $data = Menu::findOrFail($id);
        // dd($formfields);
        $data->update($request->all());
        Alert::success('Success!', 'Menu Edited Sucessfully!');
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        Alert::success('Success!', 'Menu Deleted Sucessfully!');
        return redirect()->back();
    }
}
