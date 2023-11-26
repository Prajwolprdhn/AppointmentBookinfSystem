<?php

namespace App\Http\Controllers;

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
        return view('welcome',compact('doctors'));
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
