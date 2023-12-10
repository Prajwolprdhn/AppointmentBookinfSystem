<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Menubar;
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
        $menus = Menubar::all();
        $doctors = Doctor::latest()->get();
        return view('users.layouts.main', compact('doctors', 'menus'));
    }

    public function doctors()
    {
        $menus = Menu::all();
        $doctors = Doctor::latest()->get();
        $departments = Department::get();
        $today = Carbon::now()->toDateString();
        $tomorrow = Carbon::now()->addDay()->toDateString();
        $nextDay = Carbon::now()->addDay(2)->toDateString();
        $dateFormat = [
            'today' => $today,
            'tomorrow' => $tomorrow,
            'nextDay' => $nextDay
        ];
        $department_id = null;
        $selectedDepartment = null;
        return view('users.doctor_book', compact('doctors', 'dateFormat', 'departments', 'department_id', 'selectedDepartment', 'menus'));
    }

    public function filter(Request $request)
    {
        if ($request->department_id) {
            $doctors = Doctor::where('department_id', $request->department_id)->get();
            $departments = Department::get();

            $today = Carbon::now()->toDateString();
            $tomorrow = Carbon::now()->addDay()->toDateString();
            $nextDay = Carbon::now()->addDay(2)->toDateString();
            $dateFormat = [
                'today' => $today,
                'tomorrow' => $tomorrow,
                'nextDay' => $nextDay
            ];
            $department_id = $request->department_id;
            $selectedDepartment = Department::findOrFail($request->department_id);
            // dd($selectedDepartment);
            return view('users.doctor_book', compact('doctors', 'dateFormat', 'departments', 'department_id', 'selectedDepartment'));
        }
        if ($request->search) {
            $departments = Department::get();
            $searchTerm = $request->search;
            $users = User::where('name', 'LIKE', "%$searchTerm%")->get();

            if ($users->isNotEmpty()) {
                foreach ($users as $user) {
                    $user_id = $user->id;
                }
                $doctors = Doctor::where('user_id', $user_id)->get();
            } else {
                $doctors = Doctor::where('first_name', 'LIKE', "%$searchTerm%")->get();
            }

            $today = Carbon::now()->toDateString();
            $tomorrow = Carbon::now()->addDay()->toDateString();
            $nextDay = Carbon::now()->addDay(2)->toDateString();
            $dateFormat = [
                'today' => $today,
                'tomorrow' => $tomorrow,
                'nextDay' => $nextDay
            ];
            $department_id = null;
            $selectedDepartment = null;
            // dd($doctors);
            return view('users.doctor_book', compact('doctors', 'dateFormat', 'departments', 'department_id', 'selectedDepartment'));
        }
    }

    public function create(Request $request)
    {
    }
}
