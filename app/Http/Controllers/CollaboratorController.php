<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
   public function index()
    {
        $collaborators = Collaborator::all();
        return view('admin.home.collaborators.index', compact('collaborators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $collaborator = new Collaborator();
        $collaborator->name = $request->name;
        $collaborator->link = $request->link;

        if ($request->hasFile('logo')) {
            $imageFile = $request->file('logo');
            $imageName = time().'_'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path('backend/collaborators'), $imageName);
            $collaborator->logo = 'collaborators/'.$imageName;
        }

        $collaborator->save();

        return redirect()->back()->with('success', 'Collaborator added successfully.');
    }

    public function destroy(Collaborator $collaborator)
    {
        if ($collaborator->logo && file_exists(public_path('backend/'.$collaborator->logo))) {
            unlink(public_path('backend/'.$collaborator->logo));
        }
        $collaborator->delete();
        return redirect()->back()->with('success', 'Collaborator deleted successfully.');
    }
}
