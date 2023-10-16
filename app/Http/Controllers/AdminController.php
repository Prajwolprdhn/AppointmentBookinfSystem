<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
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
        return view('admin.forms.add_user');
    }

    public function users_table(){
        $users = User::all();
        return view('admin.tables.user_details',['users' => $users]);
    }

    public function details_table(){
        return view('admin.tables.add_user');
    }

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

        $formFields['status'] = $request->has('status') ? 1 : 0;

        $formfields['name'] = $formfields['fname'] . ' ' . $formfields['lname'];
        User::create($formfields);

        return redirect()->route('users_table')
                        ->with('success','User created successfully.');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('users_table')->with('success', 'User deleted successfully.');
    }

    public function edit_form($user_id){
        $data = User::find($user_id);
        return view('admin.forms.edit_user',['details'=>$data]);
    }
    public function update(Request $request, User $user_id){
        $formfields = $request->validate([
            'status' => 'required|in:0,1',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'nullable'
        ]);
        $data = User::find($user_id);

        $formfields['name'] = $formfields['fname'] . ' ' . $formfields['lname'];
        $user_id->update($formfields);
        return redirect()->route('users_table')
                        ->with('success','User updated successfully.');
    }


    public function doctors_table(){
        $doctors = Doctor::all();
        return view('admin.tables.doctors_details',['doctors'=>$doctors]);
    }
    public function doctors_form(){
        $department = Department::all();
        return view('admin.forms.doctors_form',['departments'=>$department]);
    }
    public function add_doctors(DoctorRequest $request){
        // dd($request->all());
        $formfields = $request;
        
        $request['status'] = $request->has('status') ? 1 : 0;
        $formfields['name'] = $request['first_name'] . ' ' . $request['last_name'];

        $userData = User::create($formfields->all());
        $formfields['user_id'] = $userData->id;
        $doctorData = Doctor::create($formfields->all());
        return redirect()->route('doctors_table')
        ->with('success','User updated successfully.');
    }
}
