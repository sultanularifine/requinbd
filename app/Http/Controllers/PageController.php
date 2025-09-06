<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\ExecutiveMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
     public function home()
    {
        return view('frontend.pages.home');
    }

public function about()
{
    $page = AboutPage::first() ?? new AboutPage();
    $members = ExecutiveMember::all(); // fetch all members

    return view('frontend.pages.about', compact('page', 'members'));
}
    public function services()
    {
        return view('frontend.pages.services');
    }

    public function portfolio()
    {
        return view('frontend.pages.portfolio');
    }

    public function academy()
    {
        return view('frontend.pages.academy');
    }

    public function articles()
    {
        return view('frontend.pages.blog.index');
    }

    public function articles_view()
    {
        return view('frontend.pages.blog.view');
    }

    public function career()
    {
        return view('frontend.pages.career');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
