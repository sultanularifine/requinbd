<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
   // Display all sessions
    public function index()
    {
        $sessions = Session::latest()->get();
        return view('backend.academy.sessions.index', compact('sessions'));
    }

    // Show form to create a session
    public function create()
    {
        return view('backend.academy.sessions.create');
    }

    // Store new session
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:10',
            'date' => 'nullable|date',
            'type' => 'nullable|string|max:50',
            'mode' => 'nullable|string|max:50',
        ]);

        Session::create($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session created successfully.');
    }

    // Show form to edit a session
    public function edit(Session $session)
    {
        return view('backend.academy.sessions.edit', compact('session'));
    }

    // Update existing session
    public function update(Request $request, Session $session)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:10',
            'date' => 'nullable|date',
            'type' => 'nullable|string|max:50',
            'mode' => 'nullable|string|max:50',
        ]);

        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully.');
    }

    // Delete a session
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully.');
    }
}
