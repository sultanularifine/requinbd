<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
   
    public function index()
    {
        $directors = Director::all();
        return view('backend.directors.index', compact('directors'));
    }

    public function create()
    {
        return view('backend.directors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:directors,email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $director = new Director();
        $director->name = $request->name;
        $director->designation = $request->designation;
        $director->department = $request->department;
        $director->duration_of_employment = $request->duration_of_employment;
        $director->birthday_certificate = $request->birthday_certificate;
        $director->birthday_original = $request->birthday_original;
        $director->email = $request->email;
        $director->mobile_number = $request->mobile_number;
        $director->permanent_address = $request->permanent_address;
        $director->facebook_profile = $request->facebook_profile;
        $director->linkedin_profile = $request->linkedin_profile;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/directors'), $filename);
            $director->photo = 'uploads/directors/'.$filename;
        }

        $director->save();

        return redirect()->route('admin.directors.index')->with('success', 'Director Added Successfully!');
    }

    public function show(Director $director)
    {
        return view('backend.directors.show', compact('director'));
    }

    public function edit(Director $director)
    {
        return view('backend.directors.edit', compact('director'));
    }

    public function update(Request $request, Director $director)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:directors,email,' . $director->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $director->name = $request->name;
        $director->designation = $request->designation;
        $director->department = $request->department;
        $director->duration_of_employment = $request->duration_of_employment;
        $director->birthday_certificate = $request->birthday_certificate;
        $director->birthday_original = $request->birthday_original;
        $director->email = $request->email;
        $director->mobile_number = $request->mobile_number;
        $director->permanent_address = $request->permanent_address;
        $director->facebook_profile = $request->facebook_profile;
        $director->linkedin_profile = $request->linkedin_profile;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($director->photo && file_exists(public_path($director->photo))) {
                unlink(public_path($director->photo));
            }
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/directors'), $filename);
            $director->photo = 'uploads/directors/'.$filename;
        }

        $director->save();

        return redirect()->route('admin.directors.index')->with('success', 'Director Updated Successfully!');
    }

    public function destroy(Director $director)
    {
        if ($director->photo && file_exists(public_path($director->photo))) {
            unlink(public_path($director->photo));
        }

        $director->delete();

        return redirect()->route('admin.directors.index')->with('success', 'Director Deleted Successfully!');
    }
}

