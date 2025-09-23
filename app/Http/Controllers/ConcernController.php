<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;

class ConcernController extends Controller
{
    public function index()
    {
        $concerns = Concern::all();
        return view('admin.home.concerns.index', compact('concerns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $concern = new Concern();
        $concern->name = $request->name;
        $concern->link = $request->link;

        if ($request->hasFile('logo')) {
            $imageFile = $request->file('logo');
            $imageName = time().'_'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path('backend/concerns'), $imageName);
            $concern->logo = 'concerns/'.$imageName;
        }

        $concern->save();
        return redirect()->back()->with('success', 'Concern added successfully.');
    }

    public function destroy(Concern $concern)
    {
        if ($concern->logo && file_exists(public_path('backend/'.$concern->logo))) {
            unlink(public_path('backend/'.$concern->logo));
        }
        $concern->delete();
        return redirect()->back()->with('success', 'Concern deleted successfully.');
    }
}
