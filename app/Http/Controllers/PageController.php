<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AcademicHero;
use App\Models\Basic;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Department;
use App\Models\Director;
use App\Models\ExecutiveMember;
use App\Models\Intern;
use App\Models\Internship;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home()
{
    $basic = Basic::first(); // fetch the basic settings
    return view('frontend.pages.home', compact('basic')); // pass to the Blade view
}
    public function about()
    {
        $page = AboutPage::first() ?? new AboutPage();
        $members = ExecutiveMember::all();
        $directors = Director::all();

        // Active interns filter
        $today = Carbon::today();
        $interns = Intern::where('joining_date', '<=', $today)
            ->where('ending_date', '>=', $today)
            ->get();

        return view('frontend.pages.about', compact('page', 'members', 'directors', 'interns'));
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
    $hero = AcademicHero::latest()->first();
    $courses = Course::latest()->get();
    $internships = Internship::latest()->get();
    $sessions = Session::latest()->get(); // Fetch sessions

    return view('frontend.pages.academy', compact('hero', 'courses', 'internships', 'sessions'));
}



    public function articles()
    {

        $blogs = Blog::with('images')->orderBy('blog_date', 'desc')->get();

        // distinct categories
        $categories = Blog::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->get();

        return view('frontend.pages.blog.index', compact('blogs', 'categories'));
    }


    public function category($category)
    {
        $blogs = Blog::where('category', $category)
            ->orderBy('blog_date', 'desc')
            ->get();

        $categories = Blog::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->get();

        return view('frontend.pages.blog.index', compact('blogs', 'categories'));
    }

    public function articles_view($id)
    {
        $blog = Blog::with('images')->findOrFail($id); // remove 'comments'

        // Suggested Blogs (Same category)
        $suggestedBlogs = Blog::where('category', $blog->category)
            ->orderBy('blog_date', 'desc')
            ->take(5)
            ->get();

        // Categories
        $categories = Blog::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->get();

        return view('frontend.pages.blog.show', compact('blog', 'suggestedBlogs', 'categories'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'status' => 'pending', // admin can approve later
        ]);

        return back()->with('success', 'Your comment has been submitted for review.');
    }



    public function career()
    {
        return view('frontend.pages.career');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function internshipForm()
    {
        $departments = Department::all(); // Admin থেকে add করা সব department
        return view('frontend.pages.application-form', compact('departments'));
    }
}
