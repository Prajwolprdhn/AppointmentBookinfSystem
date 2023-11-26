<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Timing;
use App\Models\Schedule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('admin.tables.schedule',['doctors'=>$doctors]);
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
        $formFields = $request;
        $date = Carbon::parse($request['date_ad']);
        $day = $date->format('l');
        $formFields['day'] = $day;
        $formFields['doctors_id'] = intval($request->doctors_id);
        // dd($request->date_ad);

        // Handle dynamic input fields for education
        if ($request->has('schedule')) {
            foreach ($request->input('schedule.start_time') as $index => $start_time) {
                // Create a new Education instance
                $schedule = new Schedule([
                    'doctors_id' => $formFields->doctors_id,
                    'day' => $day,
                    'date_bs' => $request->date_bs,
                    'date_ad' => $request->date_ad,
                    'start_time' => $request->input('schedule.start_time')[$index],
                    'end_time' => $request->input('schedule.end_time')[$index],
                ]);
                // Save the schedule record
                $schedule->save();
            }
        }


        // Schedule::create($formFields->all());
        Alert::success('Success!','Schedule Added Sucessfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $doctors_id = $id;
        $schedules = Schedule::where('doctors_id', $doctors_id)->get();
        $timings = Timing::all();
        return view('admin.view.schedule_view',['schedules' => $schedules,'timings' => $timings,'doctors_id'=>$doctors_id]);
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
    public function destroy(Schedule $schedule, Request $request)
    {
        // dd($request->all());
        // $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        Alert::success('Success!','Schedule Deleted Sucessfully!');
        return redirect()->back();
    }
}
