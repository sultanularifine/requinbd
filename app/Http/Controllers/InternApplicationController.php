<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\InternApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'formal_name' => 'required|string|max:255',
            'email' => 'required|email|unique:intern_applications,email',
            'contact_no' => 'required',
            'dob' => 'required|date',
            'whatsapp_no' => 'required',
            'facebook_profile' => 'nullable|url',
            'linkedin_profile' => 'nullable|url',
            'institution' => 'required|string',
            'present_address' => 'required|string',
            'why_join' => 'required|string',
            'cv' => 'required|file|mimes:pdf',
            'photo' => 'required|image',
            'department_id' => 'nullable|exists:departments,id',
            'designation' => 'nullable|string|max:255', 
        ]);

        // Photo upload code (unchanged)
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = time() . '_' . $photoFile->getClientOriginalName();
            $photoFile->move(public_path('uploads/photos'), $photoName);
            $data['photo'] = 'uploads/photos/' . $photoName;
        }

        // CV upload code (unchanged)
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvName = time() . '_' . $cvFile->getClientOriginalName();
            $cvFile->move(public_path('uploads/cvs'), $cvName);
            $data['cv'] = 'uploads/cvs/' . $cvName;
        }

        // Save
        InternApplication::create($data);


        return back()->with('success', 'Your application has been submitted successfully!');
    }

    // Admin dashboard → Applications list
    public function index()
    {
        $applications = InternApplication::where('status', 'pending')->get();
        return view('backend.interns.intern-applications.index', compact('applications'));
    }



   

public function approve($id)
{
    $application = InternApplication::findOrFail($id);

    // Joining date set
    $joiningDate = Carbon::now();
    $endingDate = $joiningDate->copy()->addMonths(4); // Joining থেকে 4 মাস পর

    // Intern টেবিলে ডাটা add
    Intern::create([
        'name' => $application->formal_name,
        'email' => $application->email,
        'phone' => $application->contact_no,
        'dob' => $application->dob,
        'photo' => $application->photo,
        'cv' => $application->cv,
        'whatsapp_no' => $application->whatsapp_no,
        'facebook_link' => $application->facebook_profile,
        'linkedin_link' => $application->linkedin_profile,
        'institution' => $application->institution,
        'present_address' => $application->present_address,
        'department_id' => $application->department_id,
        'designation' => $application->designation,  // ✅ add this
        'joining_date' => $joiningDate,
        'ending_date' => $endingDate,
    ]);

    $application->update(['status' => 'approved']);

    return back()->with('success', 'Intern approved & added to database!');
}



    // Decline
    public function decline($id)
    {
        $application = InternApplication::findOrFail($id);
        $application->update(['status' => 'declined']);
        $application->delete();

        return back()->with('error', 'Application declined & removed!');
    }
}
