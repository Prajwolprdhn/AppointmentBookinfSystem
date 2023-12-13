<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Education;
use App\Models\Department;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function index()
    {
        $user = User::all();
        $department = Department::all();
        $patient = Department::all();
        $doctors = Doctor::paginate(6);
        $trashedCount = User::onlyTrashed()->count();
        $id = Auth::id(); //Auth::user();
        $userData = User::where('id', $id)->get();
        $doctorDetails = null;
        $booking = null;
        if ($userData[0]->role == 1) {
            $doctorDetails = Doctor::where('user_id', $id)->pluck('id');
            $booking = Booking::where('doctors_id', $doctorDetails)->get();
        }
        $departmentChartData = [
            'labels' => $department->pluck('departments')->toArray(),
            'values' => [],
        ];
        foreach ($department as $dept) {
            $count = Doctor::where('department_id', $dept->id)->count();
            $values[] = $count;
        }

        $departmentChartData['values'] = $values;
        return view('dashboard', compact('user', 'doctors', 'booking', 'department', 'trashedCount', 'departmentChartData', 'id', 'doctorDetails', 'patient'));
    }
    public function users_form()
    {
        return view('admin.forms.add_user');
    }

    public function users_table()
    {
        $users = User::latest()->get();

        return view('admin.tables.user_details', ['users' => $users]);
    }

    public function details_table()
    {
        return view('admin.tables.add_user');
    }

    public function create(UserRequest $request)
    {
        $formfields = $request;
        $formFields['status'] = $request->has('status') ? 1 : 0;

        $formfields['name'] = $formfields['first_name'] . ' ' . $formfields['last_name'];
        $userData = User::create($formfields->all());

        if ($formfields['role'] == 1) {
            $formfields['user_id'] = $userData->id;
            $doctorData = Doctor::create($formfields->all());
        }
        Alert::success('Success!', 'User Created Sucessfully!');
        return redirect()->route('users_table');
    }

    public function delete($user_id)
    {
        // dd($user_id);
        $user = User::findOrFail($user_id);
        if ($user->doctor) {
            $user->doctor->delete();
        }
        $user->delete();
        Alert::success('Success!', 'User Deleted Sucessfully!');
        return redirect()->route('users_table');
    }

    public function edit_form($user_id)
    {
        $data = User::findOrFail($user_id);
        return view('admin.forms.edit_user', ['details' => $data]);
    }
    public function update(DoctorRequest $request, User $user_id)
    {
        $formfields = $request;
        $data = User::find($user_id);

        $formfields['name'] = $formfields['fname'] . ' ' . $formfields['lname'];
        // dd($formfields);
        $user_id->update($formfields);
        Alert::success('Success!', 'User Edited Sucessfully!');
        return redirect()->route('users_table');
    }


    public function doctors_table()
    {
        $doctors = Doctor::latest()->get();
        return view('admin.tables.doctors_details', ['doctors' => $doctors]);
    }
    public function doctors_form()
    {
        $department = Department::all();
        $jsonFile = Storage::get('nepal_location.json');
        $data = json_decode($jsonFile);
        return view('admin.forms.doctors_form', ['departments' => $department, 'data' => $data]);
    }
    public function add_doctors(DoctorRequest $request)
    {
        // foreach($request->get('education') as $educations){
        //     dd($educations);
        // }
        // dd($request);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $fileName = $imagePath->getClientOriginalName();
            $request['photo'] = 'storage/img/' . $fileName;
            $imagePath->storeAs('public/img', $fileName);
        }

        $formfields = $request;
        $request['status'] = $request->has('status') ? 1 : 0;
        $formfields['name'] = $request['first_name'] . ' ' . $request['last_name'];
        $formfields['role'] = 1;

        $userData = User::create($formfields->all());
        $formfields['user_id'] = $userData->id;
        $doctorData = Doctor::create($formfields->all());

        // Handle dynamic input fields for education
        if ($request->has('education')) {
            foreach ($request->input('education.institution') as $index => $institution) {
                // Create a new Education instance
                $education = new Education([
                    'doctors_id' => $doctorData->id,
                    'institution' => $institution,
                    'board' => $request->input('education.board')[$index],
                    'level' => $request->input('education.level')[$index],
                    'completion_year' => $request->input('education.completion_year')[$index],
                    'score' => $request->input('education.score')[$index],
                ]);

                // Save the education record
                $education->save();
            }
        }

        // Handle dynamic input fields for experience
        if ($request->has('experience')) {
            foreach ($request->input('experience.organization') as $index => $organization) {
                $experience = new Experience([
                    'doctors_id' => $doctorData->id,
                    'organization' => $organization,
                    'position' => $request->input('experience.position')[$index],
                    'start_date' => $request->input('experience.start_date')[$index],
                    'end_date' => $request->input('experience.end_date')[$index],
                    'job_description' => $request->input('experience.job_description')[$index],
                ]);

                $experience->save();
            }
        }

        Alert::success('Success!', 'Doctor Added Successfully!');

        return redirect()->route('doctors_table');
    }
    public function delete_doctor(Doctor $doctor)
    {
        if ($doctor->user) {
            $doctor->user->delete();
        }
        $doctor->delete();
        Alert::success('Success!', 'User Deleted Sucessfully!');
        return redirect()->route('doctors_table')->with('success', 'Doctor deleted successfully.');
    }

    public function edit_doctor($doctor_id)
    {
        // $department = Department::all();
        // $data = Doctor::findOrFail($doctor_id);
        // $user = $data->user;
        // $result = [
        //     'doctor' => $data,
        //     'user' => $user,
        // ];
        // dd($result);

        $doctor = Doctor::findOrFail($doctor_id);
        $jsonFile = Storage::get('nepal_location.json');
        $data = json_decode($jsonFile);
        $departments = Department::all();

        return view('admin.forms.edit_doctor', compact('doctor', 'departments', 'data'));
    }

    public function update_doctor(DoctorRequest $request, Doctor $doctor_id)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $fileName = $imagePath->getClientOriginalName();
            $request['photo'] = 'storage/img/' . $fileName;
            $imagePath->storeAs('public/img', $fileName);
        }
        $formfields = $request;
        $formfields['name'] = $request['first_name'] . ' ' . $request['last_name'];
        $doctor_id->user->update($formfields->all());
        if ($doctor_id) {
            Education::where('doctors_id', $doctor_id->id)->delete();
        }
        foreach ($request->input('education.institution') as $index => $institution) {
            // Create a new Education instance
            $education = new Education([
                'doctors_id' => $doctor_id->id,
                'institution' => $institution,
                'board' => $request->input('education.board')[$index],
                'level' => $request->input('education.level')[$index],
                'completion_year' => $request->input('education.completion_year')[$index],
                'score' => $request->input('education.score')[$index],
            ]);
            $education->save();
        }
        if ($doctor_id) {
            Experience::where('doctors_id', $doctor_id->id)->delete();
        }
        foreach ($request->input('experience.organization') as $index => $organization) {
            $experience = new Experience([
                'doctors_id' => $doctor_id->id,
                'organization' => $organization,
                'position' => $request->input('experience.position')[$index],
                'start_date' => $request->input('experience.start_date')[$index],
                'end_date' => $request->input('experience.end_date')[$index],
                'job_description' => $request->input('experience.job_description')[$index],
            ]);

            $experience->save();
        }

        $doctor_id->update($formfields->all());
        Alert::success('Success!', 'Doctor Updated Successfully!');

        return redirect()->route('doctors_table');
    }

    public function view_doctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        // dd($doctor);
        return view('admin.view.doctors_view', compact('doctor'));
    }

    public function change_form($id)
    {
        return view('doctors.forms.password_change', compact('id'));
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'confirmed|required|min:8',
        ]);
        $user = Auth::user();
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword, $user->password)) {
            $user = User::find(auth()->user()->id);
            $user->update(['password' => Hash::make($request->password)]);
            Alert::success('Success!', 'Password changed successfully!');
            return redirect()->back()->with("info_success", "Password updated successfully");
        } else {
            return redirect()->back()->withErrors(["old_password" => "Old password is not correct !"]);
        }
    }
}
