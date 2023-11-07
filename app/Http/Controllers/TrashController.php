<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = User::onlyTrashed()->get();
        $doctorData = Doctor::onlyTrashed()->get();
        return view('admin.tables.trash', ['user' => $userData, 'doctors' => $doctorData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(int $id)
    {
        // dd($id);
        $user = User::onlyTrashed()->find($id);
        $doctor = Doctor::onlyTrashed()->where('user_id', $id)->first();
        // dd($doctor);
        if($user!=null){
            $user->forceDelete();
        }
        $doctor->forceDelete();
        Alert::success('Success!','User Deleted Sucessfully!');
        return redirect()->route('trash.index');
    }

    public function restore($user_id){
        // dd($user_id);
        $doctor = Doctor::onlyTrashed()->where('user_id', $user_id)->first();
        if($doctor){
            $doctor->restore();
        }
        $user = User::onlyTrashed()->find($user_id);
        $user->restore();
        Alert::success('Success!','User Restored Sucessfully!');
        return redirect()->route('trash.index');

    }
}
