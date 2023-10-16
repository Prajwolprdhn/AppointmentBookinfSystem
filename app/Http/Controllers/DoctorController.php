<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctors.forms.doctors_form');
    }
    public function education_form()
    {
       
        return view('doctors.forms.education_form');
    }

    public function doctors_table(){
        return view('doctors.tables.doctors_table');
    }

    public function details_table(){
        return view('doctors.tables.user_details_table');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $formfields = $request->validate([
            'status' => 'required|in:0,1',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8',
            'role' => 'nullable'
        ]);

        $formFields['status'] = $request->has('status') ? 1 : null;

        $formfields['name'] = $formfields['fname'] . ' ' . $formfields['lname'];
        User::create($formfields);
        print("Sucess");

        return redirect()->route('doctors_table')
                        ->with('success','Doctor created successfully.');
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
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
