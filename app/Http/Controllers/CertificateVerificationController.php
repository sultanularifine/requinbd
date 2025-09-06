<?php

namespace App\Http\Controllers;

use App\Models\CertificateSignatures;
use App\Models\Intern;
use Illuminate\Http\Request;

class CertificateVerificationController extends Controller
{
  
    
    // Verify the certificate
    public function verifyCertificate(Request $request)
    {
        $request->validate([
            'certificate_no' => 'required|string',
        ]);

        $intern = Intern::with('department')->where('certificate_no', $request->certificate_no)->first();

        if (!$intern) {
            return back()->with('error', 'Certificate not found.');
        }
        $certificate = CertificateSignatures::where('department_id', $intern->department_id)->first();
        return view('frontend.certificate_verification.result', compact('intern', 'certificate'));
    }
}
