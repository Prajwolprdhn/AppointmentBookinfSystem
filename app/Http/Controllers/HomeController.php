<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $doctors = Doctor::latest()->get();
        return view('users.layouts.main',compact('doctors'));
    }

    public function doctors()
    {
       $doctors = Doctor::latest()->get();
       $today = Carbon::now()->toDateString();
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $nextDay = Carbon::now()->addDay(2)->toDateString();
        $dateFormat = [
            'today' => $today,
            'tomorrow' => $tomorrow,
            'nextDay' => $nextDay
        ];
        return view('users.doctor_book',compact('doctors','dateFormat'));
    }

    public function users_form(){
        
    }

    public function users_table(){
        
    }

    public function details_table(){
    }

    public function create(Request $request)
    {
    }

}
