<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
     public function index()
{
    // Load both interns and executive_members relationships
    $departments = Department::with(['interns', 'executiveMembers'])->get();

    return view('backend.departments.index', compact('departments'));
}
    // Show form to create a new department
    public function create()
    {
        return view('backend.departments.create');
    }

    // Store a new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
        ]);

        Department::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
    }

    // Show single department
    public function show(Department $department)
    {
        return view('admin.departments.show', compact('department'));
    }

    // Show form to edit a department
    public function edit(Department $department)
    {
        return view('backend.departments.edit', compact('department'));
    }

    // Update department
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
        ]);

        $department->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    // Delete department
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
}
