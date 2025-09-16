<?php

namespace App\Http\Controllers;

use App\Models\AcademicHero;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
     public function index()
    {
        $hero = AcademicHero::first();
        return view('backend.academy.hero.create', ['hero' => $hero]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string',
            'hero_subtitle' => 'nullable|string',
            'hero_text' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $hero = AcademicHero::first() ?? new AcademicHero();
        $hero->hero_title = $request->hero_title;
        $hero->hero_subtitle = $request->hero_subtitle;
        $hero->hero_text = $request->hero_text;

        if ($request->hasFile('hero_image')) {
            if ($hero->hero_image) {
                $oldImagePath = public_path($hero->hero_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageFile = $request->file('hero_image');
            $imageName = time().'_'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path('backend/hero'), $imageName);
            $hero->hero_image = 'backend/hero/'.$imageName;
        }

        $hero->save();

        return redirect()->route('settings.hero')->with('success', 'Hero Section Updated Successfully');
    }
}
