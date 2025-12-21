<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first(); // Only one record for hero section
        return view('admin.home.hero.index', compact('hero'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'facebook'    => 'nullable|url',
            'linkedin'    => 'nullable|url',
            'instagram'   => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the first hero record, or create new
        $hero = HeroSection::first() ?? new HeroSection();

        // Assign values
        $hero->title       = $request->title;
        $hero->description = $request->description;
        $hero->button_text = $request->button_text;
        $hero->facebook    = $request->facebook;
        $hero->linkedin    = $request->linkedin;
        $hero->instagram   = $request->instagram;

        // Handle Image
        if ($request->hasFile('image')) {
            if ($hero->image) {
                $oldimagePath = public_path('backend/' . $hero->image);
                if (file_exists($oldimagePath)) {
                    unlink($oldimagePath);
                }
            }
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('backend/hero'), $imageName);
            $hero->image = 'hero/' . $imageName;
        }

        $hero->save();

        return redirect()->route('admin.hero.index')->with('success', 'Hero section saved successfully.');
    }
}
