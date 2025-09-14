<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show create user form
    public function create()
    {
        return view('backend.users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,executive,intern',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'email', 'role');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/users', $filename, 'public');
            $data['photo'] = 'storage/' . $path;
        }

        User::create($data);

        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }

    // Show user list
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    // Edit user form
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,executive,intern',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/users', $filename, 'public');
            $user->photo = 'storage/' . $path;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
