<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\ExecutiveMember;
use Illuminate\Http\Request;

class ExecutiveMemberController extends Controller
{
    public function index()
    {
        $members = ExecutiveMember::with('department')->get();
        return view('backend.executive_members.index', compact('members'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('backend.executive_members.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:executive_members,email',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = new ExecutiveMember();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->designation = $request->designation;
        $member->joining_date = $request->joining_date;
        $member->department_id = $request->department_id;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/executive_members'), $filename);
            $member->photo = 'uploads/executive_members/' . $filename;
        }

        $member->save();

        return redirect()->route('admin.executive_members.index')->with('success', 'Executive Member Added Successfully!');
    }

   public function show(ExecutiveMember $executive_member)
{
    return view('backend.executive_members.show', ['member' => $executive_member]);
}

public function edit(ExecutiveMember $executive_member)
{
    $departments = Department::all();
    return view('backend.executive_members.edit', ['member' => $executive_member, 'departments' => $departments]);
}

    public function update(Request $request, ExecutiveMember $executive_member)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:executive_members,email,' . $executive_member->id,
        'department_id' => 'required|exists:departments,id',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $executive_member->name = $request->name;
    $executive_member->email = $request->email;
    $executive_member->phone = $request->phone;
    $executive_member->designation = $request->designation;
    $executive_member->joining_date = $request->joining_date;
    $executive_member->department_id = $request->department_id;

    // Handle photo upload and remove old photo if exists
    if ($request->hasFile('photo')) {
        if ($executive_member->photo && file_exists(public_path($executive_member->photo))) {
            unlink(public_path($executive_member->photo));
        }

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/executive_members'), $filename);
        $executive_member->photo = 'uploads/executive_members/' . $filename;
    }

    $executive_member->save();

    return redirect()->route('admin.executive_members.index')
                     ->with('success', 'Executive Member Updated Successfully!');
}


    public function destroy(ExecutiveMember $executive_member)
    {
        if ($executive_member->photo && file_exists(public_path($executive_member->photo))) {
            unlink(public_path($executive_member->photo));
        }
        $executive_member->delete();
        return redirect()->route('admin.executive_members.index')->with('success', 'Executive Member Deleted Successfully!');
    }
}
