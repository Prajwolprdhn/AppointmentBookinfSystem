<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department=Department::all();
        return view('admin.tables.department_details',['departments'=>$department]);
    }
    public function add_department(){
        
        return view('admin.forms.add_department');
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
}
