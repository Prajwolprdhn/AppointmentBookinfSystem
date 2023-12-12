<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $id = $request->input('id');
        $data = User::findOrFail($id);
        if ($data->role == 0) {
            $patients = Patient::latest()->take(15)->get();
            // $patients = Patient::skip(5)->take(5)->get(); slice(5)
        } else {
            $doctorData = Doctor::where('user_id', $id)->first();
            $patients = Booking::where('doctors_id', $doctorData->id)->with('patient')->latest()->get();
        }
        return view('admin.view.patients_view', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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
    public function destroy(string $id)
    {
        //
    }
}
