<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PatientRequest;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctors = Doctor::latest()->get();
        $department = Department::latest()->get();
        return redirect()->back();
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
        $doctor = Doctor::findOrFail($request['doctors_id']);
        // dd($doctor);
        $doctor->notify(new BookingNotification($patientDetail, $scheduleData));
        // dd("done");
        Mail::send(
            'email.bookings_made',
            $scheduleData->toArray(),
            function ($message) {
                $message->to('prajwolp81@gmail.com', 'Doctor')->subject('New Appointments Registered.');
            }
        );
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

        Alert::success('Success!', 'Appointment Registered Successfully!');
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
        Alert::success('Success!', 'Bookings Deleted Sucessfully!');
        return redirect()->back();
    }

    public function markasread()
    {
        auth()->user()->doctor->notifications->markAsRead();
        return back();
    }
    public function markasread1()
    {
        auth()->user()->user->notifications->markAsRead();
        return back();
    }
}
