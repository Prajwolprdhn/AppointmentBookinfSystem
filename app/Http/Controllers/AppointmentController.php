<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Booking::all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $doctors_id = $id;
        $appointment = Booking::where('doctors_id', $doctors_id)->get();
        return view('doctors.view.appointments',['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        $status = $request->input('status');
        $booking = Booking::find($id);
        $patient = $booking->patient;
        $booking->status = $status;
        $schedule = $booking->schedule;
        $email = $patient['email'];
        $schedule['appointment_status'] = $status;
        if ($status == 1) {
            Mail::send('email.status_change', $schedule->toArray(), function($message) use ($email){
                $message->to($email, 'Patient')->subject('Appointment Approved');
            });

        } elseif($status == 2) {
            Mail::send('email.status_change', $schedule->toArray(), function($message) use ($email){
                $message->to($email, 'Patient')->subject('Appointment Declined');
            });
        }
        $booking->save();
        Alert::success('Success!','Status Changed Sucessfully!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
