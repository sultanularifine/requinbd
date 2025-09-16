<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('backend.academy.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.academy.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'icon' => 'nullable|string|max:5'
        ]);

        Course::create($request->all());
        
        return redirect()->route('courses.index')->with('success', 'Course created.');
    }

    public function edit(Course $course)
    {
        return view('backend.academy.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'tags' => 'nullable|string',
            'icon' => 'nullable|string|max:5'
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
