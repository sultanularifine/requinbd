<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Faker\Core\File;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
   

    public function index()
    {
        $hero = HeroSection::find(1);
        return view('admin.hero.index', compact('hero'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'subtitle'    => 'nullable|string',
        'button_text' => 'nullable|string|max:50',
        'button_link' => 'nullable|string|max:255',
        'facebook'    => 'nullable|string|max:255',
        'linkedin'    => 'nullable|string|max:255',
        'instagram'   => 'nullable|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $hero = HeroSection::first();
    if (empty($hero)) {
        $hero = new HeroSection();
    }
    $hero->id = 1; // always single row

    // Fill fields
    $hero->title       = $request->title;
    $hero->subtitle    = $request->subtitle;
    $hero->button_text = $request->button_text;
    $hero->button_link = $request->button_link;
    $hero->facebook    = $request->facebook;
    $hero->linkedin    = $request->linkedin;
    $hero->instagram   = $request->instagram;

    // Handle image
    if ($request->hasFile('image')) {
        if (!empty($hero->image) && file_exists(public_path($hero->image))) {
            unlink(public_path($hero->image));
        }
        $imageFile = $request->file('image');
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('backend/hero'), $imageName);
        $hero->image = 'backend/hero/' . $imageName;
    }

    if ($hero->save()) {
        return redirect()->route('admin.hero.index')->with('success', 'Hero Section updated!');
    }
}

}
