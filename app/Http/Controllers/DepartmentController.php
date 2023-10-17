<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        // dd($departments);
        return view('admin.tables.department_details',['departments'=>$departments]);
    }
    public function add_department(){
        $department=Department::all();
        return view('admin.forms.add_department',['departments'=>$department]);
    }
    public function create(Request $request)
    {
        // $department = new Department;
        // $department -> departments = $request->input('department');
        // $department->save();
        $validatedData = $request->validate([
            'department' => 'required|string|max:255',
        ]);
        $department = Department::create(['departments' => $validatedData['department']]);

        return redirect()->route('department_table')
                        ->with('success','Department created successfully.');
    }

    public function delete(Department $department){
        $department->delete();
        return redirect()->route('department_table')->with('success', 'Department deleted successfully.');
    }
    public function edit_department($department_id){
        $data = Department::findOrFail($department_id);
        return view('admin.forms.edit_department',['department'=>$data]);
    }
    public function update(Request $request, $department_id){
        // dd($department_id);
        $formfields = $request->validate([
            'department' => 'required'
        ]);
        $data = Department::find($department_id);
        $data->departments = $request->department;
        $data->update();
        return redirect()->route('department_table')
                        ->with('success','Department updated successfully.');
    }
}
