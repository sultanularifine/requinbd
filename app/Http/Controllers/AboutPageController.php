<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function edit()
    {
        $page = AboutPage::first(); // single row for the about page
        return view('admin.about.edit', compact('page'));
    }

public function update(Request $request)
{
    $page = AboutPage::find(1) ?? new AboutPage();
    $page->id = 1; // ensure always the same record

    // Keep old images
    $heroImages = json_decode($page->hero_images ?? '[]', true);

    // Handle hero images
    if ($request->hasFile('hero_images')) {
        foreach ($request->file('hero_images') as $file) {
            // Generate unique filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move to public/backend/hero
            $file->move(public_path('backend/hero'), $filename);

            // Save path (relative for asset())
            $heroImages[] = 'backend/hero/' . $filename;
        }
    }

    $page->hero_images   = json_encode($heroImages);
    $page->hero_title    = $request->hero_title;
    $page->hero_subtitle = $request->hero_subtitle;
    $page->about_text1   = $request->about_text1;
    $page->about_text2   = $request->about_text2;
    $page->mission       = $request->mission;
    $page->vision        = $request->vision;

    $page->save();

    return redirect()->back()->with('success', 'About page updated!');
}


}
