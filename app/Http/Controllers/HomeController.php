<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::all();
        $department=Department::all();
        return view('home',['user'=>$user,'department'=>$department]);
    }
    // public function authenticate(Request $request){
    //     $user = Auth::attempt( [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ]);      

    //     if ($user) {
    //         if (Auth::user()->role == 'Admin') {
    //             return view('admin.dashboard');
    //         }
    //         elseif (Auth::user()->role == 'Doctor') {
    //             return view('doctors.dashboard'); 
    //         }else{
    //             return view('/'); 
    //         }
    //     }
    // }

    public function users_form(){
        return view('users.forms.add_user');
    }

    public function users_table(){
        $users = User::all();
        return view('users.tables.user_details',['users' => $users]);
    }

    public function details_table(){
        return view('users.tables.add_user');
    }

    public function create(Request $request)
    {
        $formfields = $request->validate([
            'status' => 'required|in:0,1',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|string|min:8',
            'password_confirmation' => 'required',
            'role' => 'nullable'
        ]);

        $formFields['status'] = $request->has('status') ? 1 : null;

        $formfields['name'] = $formfields['fname'] . ' ' . $formfields['lname'];
        User::create($formfields);

        return redirect()->route('users_table')
                        ->with('success','Doctor created successfully.');
    }

}
