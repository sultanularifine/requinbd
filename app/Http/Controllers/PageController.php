<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Director;
use App\Models\ExecutiveMember;
use App\Models\Intern;
use Carbon\Carbon;
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
    $members = ExecutiveMember::all(); 
    $directors = Director::all();      

    // ✅ Active interns filter
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
      public function internshipForm()
    {
        return view('frontend.pages.application-form'); 
    }

    // Store internship application
    // public function internshipStore(Request $request)
    // {
    //     $request->validate([
    //         'formal_name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'department' => 'required|string|max:100',
    //         'contact_no' => 'required|string|max:50',
    //         'dob' => 'required|date',
    //         'whatsapp_no' => 'required|string|max:50',
    //         'institution' => 'required|string|max:255',
    //         'present_address' => 'required|string|max:500',
    //         'why_join' => 'required|string|max:1000',
    //         'cv' => 'required|mimes:pdf|max:2048',
    //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $application = new InternApplication();
    //     $application->formal_name = $request->formal_name;
    //     $application->email = $request->email;
    //     $application->department = $request->department;
    //     $application->contact_no = $request->contact_no;
    //     $application->dob = $request->dob;
    //     $application->whatsapp_no = $request->whatsapp_no;
    //     $application->facebook_profile = $request->facebook_profile;
    //     $application->linkedin_profile = $request->linkedin_profile;
    //     $application->institution = $request->institution;
    //     $application->present_address = $request->present_address;
    //     $application->why_join = $request->why_join;
    //     $application->timestamp = now();

    //     // Upload CV
    //     if ($request->hasFile('cv')) {
    //         $cv = $request->file('cv');
    //         $cvName = time().'_'.$cv->getClientOriginalName();
    //         $cv->move(public_path('uploads/cvs'), $cvName);
    //         $application->cv = 'uploads/cvs/'.$cvName;
    //     }

    //     // Upload Photo
    //     if ($request->hasFile('photo')) {
    //         $photo = $request->file('photo');
    //         $photoName = time().'_'.$photo->getClientOriginalName();
    //         $photo->move(public_path('uploads/photos'), $photoName);
    //         $application->photo = 'uploads/photos/'.$photoName;
    //     }

    //     $application->save();

    //     return redirect()->back()->with('success', 'Your internship application has been submitted successfully!');
    // }
}
