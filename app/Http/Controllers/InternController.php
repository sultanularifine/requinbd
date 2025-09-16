<?php

namespace App\Http\Controllers;

use App\Models\CertificateSignatures;
use App\Models\Department;
use App\Models\Intern;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        $interns = Intern::with('department')->get();
        return view('backend.interns.index', compact('interns'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('backend.interns.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:interns,email',
            'department_id' => 'required|exists:departments,id',
            'joining_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf|max:5120',
        ]);

        $intern = new Intern();
        $intern->name = $request->name;
        $intern->email = $request->email;
        $intern->phone = $request->phone;
        $intern->designation = $request->designation;
        $intern->dob = $request->dob;
        $intern->whatsapp_no = $request->whatsapp_no;
        $intern->facebook_link = $request->facebook_link;
        $intern->linkedin_link = $request->linkedin_link;
        $intern->institution = $request->institution;
        $intern->present_address = $request->present_address;
        $intern->joining_date = $request->joining_date;

        // Automatically calculate ending date (4 months later)
    $intern->ending_date = $request->ending_date ?? date('Y-m-d', strtotime($request->joining_date . ' +4 months'));
        $intern->department_id = $request->department_id;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/interns'), $filename);
            $intern->photo = 'uploads/interns/' . $filename;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/cvs'), $filename);
            $intern->cv = 'uploads/cvs/' . $filename;
        }

        // Generate dynamic certificate number
        $dept = Department::find($request->department_id);
        $batch = 'B1'; // Change as needed or make dynamic
        $lastIntern = Intern::where('department_id', $request->department_id)->count() + 1;
        $intern->certificate_no = 'R' . strtoupper(substr($dept->name, 0, 1)) . $batch . $lastIntern;

        $intern->save();

        return redirect()->route('admin.interns.index')->with('success', 'Intern Added Successfully!');
    }

    public function show(Intern $intern)
    {
        return view('backend.interns.view', compact('intern'));
    }

    public function edit($id)
    {
        $intern = Intern::findOrFail($id);
        $departments = Department::all();
        return view('backend.interns.edit', compact('intern', 'departments'));
    }

    public function update(Request $request, Intern $intern)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:interns,email,' . $intern->id,
        'department_id' => 'required|exists:departments,id',
        'joining_date' => 'required|date',
        'ending_date' => 'nullable|date',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv' => 'nullable|mimes:pdf|max:5120',
    ]);

    $intern->name = $request->name;
    $intern->email = $request->email;
    $intern->phone = $request->phone;
    $intern->designation = $request->designation;
    $intern->dob = $request->dob;
    $intern->whatsapp_no = $request->whatsapp_no;
    $intern->facebook_link = $request->facebook_link;
    $intern->linkedin_link = $request->linkedin_link;
    $intern->institution = $request->institution;
    $intern->present_address = $request->present_address;
    $intern->joining_date = $request->joining_date;
    $intern->ending_date = $request->ending_date ?? date('Y-m-d', strtotime($request->joining_date . ' +4 months'));
    $intern->department_id = $request->department_id;
    $intern->certificate_no = $request->certificate_no;

    // ✅ Handle photo upload
    if ($request->hasFile('photo')) {
        if ($intern->photo && file_exists(public_path($intern->photo))) {
            unlink(public_path($intern->photo));
        }

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/interns'), $filename);
        $intern->photo = 'uploads/interns/' . $filename;
    }

    // ✅ Handle CV upload
    if ($request->hasFile('cv')) {
        if ($intern->cv && file_exists(public_path($intern->cv))) {
            unlink(public_path($intern->cv));
        }

        $file = $request->file('cv');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/cvs'), $filename);
        $intern->cv = 'uploads/cvs/' . $filename;
    }

    // Certificate number unchanged
    $intern->save();

    return redirect()->route('admin.interns.index')->with('success', 'Intern Updated Successfully!');
}

public function destroy(Intern $intern)
{
    // ✅ Delete photo if exists
    if ($intern->photo && file_exists(public_path($intern->photo))) {
        unlink(public_path($intern->photo));
    }

    // ✅ Delete CV if exists
    if ($intern->cv && file_exists(public_path($intern->cv))) {
        unlink(public_path($intern->cv));
    }

    $intern->delete();

    return redirect()->route('admin.interns.index')->with('success', 'Intern Deleted Successfully!');
}


    public function certificate($id)
    {
        $intern = Intern::with('department')->findOrFail($id);
        $certificate = CertificateSignatures::where('department_id', $intern->department_id)->first();

        return view('backend.interns.certificate', compact('intern', 'certificate'));
    }

    public function downloadCertificate($id)
    {
        $intern = Intern::with('department')->findOrFail($id);
        $certificate = CertificateSignatures::first();
        $pdf = Pdf::loadView('backend.interns.certificate_pdf', compact('intern', 'certificate'))
            ->setPaper('a4', 'landscape');

        return $pdf->download($intern->name . '_certificate.pdf');
    }

    public function downloadCV($id)
    {
        $intern = Intern::findOrFail($id);
        if ($intern->cv && file_exists(public_path($intern->cv))) {
            return response()->download(public_path($intern->cv), $intern->name . '_CV.pdf');
        }
        return back()->with('error', 'CV not found.');
    }
}
