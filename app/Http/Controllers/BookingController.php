<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PatientRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::latest()->get();
        return view('welcome',compact('doctors'));
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
    public function store(PatientRequest $request)
    {
        //
        // dd($request);
        $patientDetail = Patient::create($request->all());
        $request['patient_id'] = $patientDetail->id;
        $scheduleData = Schedule::findOrFail($request->schedule_id);
        $request['doctors_id'] = $scheduleData->doctors_id;

        $booking = Booking::create($request->only([
            'book_date_bs',
            'book_date_ad',
            'schedule_id',
            'patient_id',
            'doctors_id',
            'updated_at',
            'created_at',
        ]));
        $scheduleData->update(['status' => 1]);
        Mail::send('email.bookings_made',$scheduleData->toArray(),
        function($message){
            $message->to('prajwolp81@gmail.com','Doctor')->subject('New Appointments Registered.');
        });
        Alert::success('Success!','Appointment Registered Successfully!');
        return redirect()->back();
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
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        Alert::success('Success!','Bookings Deleted Sucessfully!');
        return redirect()->back();
    }
}
