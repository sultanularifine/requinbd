<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
     public function index()
    {
        $internships = Internship::latest()->get();
        return view('backend.academy.internships.index', compact('internships'));
    }

    public function create()
    {
        return view('backend.academy.internships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
            'stipend' => 'nullable|string|max:255',
            'mode' => 'required|string|in:Remote,On-site',
        ]);

        Internship::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
            'stipend' => $request->stipend,
            'mode' => $request->mode,
        ]);

        return redirect()->route('internships.index')->with('success', 'Internship created successfully.');
    }

    public function edit(Internship $internship)
    {
        return view('backend.academy.internships.edit', compact('internship'));
    }

    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
            'stipend' => 'nullable|string|max:255',
            'mode' => 'required|string|in:Remote,On-site',
        ]);

        $internship->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
            'stipend' => $request->stipend,
            'mode' => $request->mode,
        ]);

        return redirect()->route('internships.index')->with('success', 'Internship updated successfully.');
    }

    public function destroy(Internship $internship)
    {
        $internship->delete();
        return redirect()->route('internships.index')->with('success', 'Internship deleted successfully.');
    }
}
