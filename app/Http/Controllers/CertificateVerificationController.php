<?php

namespace App\Http\Controllers;

use App\Models\CertificateSignatures;
use App\Models\Intern;
use Illuminate\Http\Request;

class CertificateVerificationController extends Controller
{


    // Show the verification form
    public function showForm()
    {
        return view('frontend.pages.certificate_verification.result'); // Blade file name
    }

    // Handle verification
    // In CertificateVerificationController.php
    public function verify(Request $request)
    {
        $request->validate([
            'certificate_no' => 'required|string',
        ]);

        // Find intern with the certificate number
        $intern = Intern::with('department')->where('certificate_no', $request->certificate_no)->first();

        if (!$intern) {
            return back()->with('error', 'Certificate not found.');
        }

        // Get signature for the intern's department
        $certificate = CertificateSignatures::where('department_id', $intern->department_id)->first();

        // Return a dedicated view showing the certificate dynamically
        return view('frontend.pages.certificate_verification.result', compact('intern', 'certificate'));
    }
}
