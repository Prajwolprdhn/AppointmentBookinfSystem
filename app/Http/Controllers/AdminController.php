<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\EditDoctorRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $user=User::all();
        $department=Department::all();
        return view('home',['user'=>$user,'department'=>$department]);
    }
    public function users_form(){
        return view('admin.forms.add_user');
    }

    public function users_table(){
        $users = User::latest()->get();

        return view('admin.tables.user_details',['users' => $users]);
    }

    public function details_table(){
        return view('admin.tables.add_user');
    }

    public function create(UserRequest $request)
    {
        $formfields = $request;

        $formFields['status'] = $request->has('status') ? 1 : 0;

        $formfields['name'] = $formfields['first_name'] . ' ' . $formfields['last_name'];
        $userData=User::create($formfields->all());

        if($formfields['role'] == 1){
            $formfields['user_id'] = $userData->id;
        // dd($formfields->all());
        $doctorData = Doctor::create($formfields->all());
        }
        Alert::success('Success!','User Created Sucessfully!');
        return redirect()->route('users_table');
    }

    public function delete(User $user){
        $user->delete();
        Alert::success('Success!','User Deleted Sucessfully!');
        return redirect()->route('users_table')->with('success', 'User deleted successfully.');
    }

    public function edit_form($user_id){
        $data = User::findOrFail($user_id);
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
        dd($formfields);
        $user_id->update($formfields);
        Alert::success('Success!','User Edited Sucessfully!');
        return redirect()->route('users_table')
                        ->with('success','User updated successfully.');
    }


    public function doctors_table(){
        $doctors = Doctor::all();
        // $departmentValue = $doctors['department'];
        // $data= Department::find($departmentValue);
        // $doctors['department'] = $data['departments'];
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
        $formfields['role'] = 1;

        $userData = User::create($formfields->all());

        $formfields['user_id'] = $userData->id;
        // dd($formfields->all());
        $doctorData = Doctor::create($formfields->all());

        return redirect()->route('doctors_table')
        ->with('success','User updated successfully.');
    }
    public function delete_doctor(Doctor $doctor){
        $doctor->delete();
        Alert::success('Success!','User Deleted Sucessfully!');
        return redirect()->route('doctors_table')->with('success', 'Doctor deleted successfully.');
    }

    public function edit_doctor($doctor_id){
        $department = Department::all();
        $data = Doctor::findOrFail($doctor_id);
        $user = $data->user;
        $result = [
            'doctor' => $data,
            'user' => $user,
        ];
        // dd($result);
        return view('admin.forms.edit_doctor',['result'=>$result,'departments'=>$department]);
    }

    public function update_doctor(EditDoctorRequest $request, $doctor_id){
        // $formfields = $request;
        // // dd($doctor_id);
        // $request['status'] = $request->has('status') ? 1 : 0;
        // $formfields['name'] = $request['first_name'] . ' ' . $request['last_name'];
        // $data = Doctor::findOrFail($doctor_id);
        // $user = $data->user;
        // // dd($formfields);
        // $userData = User::where('id', $user->id)->update($formfields->all());
        // dd($userData);
        // $formfields['user_id'] = $userData->id;
        // // dd($formfields->all());
        // $doctorData = Doctor::update($formfields->all());

        // return redirect()->route('doctors_table')
        // ->with('success','User updated successfully.');

        $formfields = $request;
        $request['status'] = $request->has('status') ? 1 : 0;
        $formfields['name'] = $request['first_name'] . ' ' . $request['last_name'];
        dd($formfields);
    }
}
