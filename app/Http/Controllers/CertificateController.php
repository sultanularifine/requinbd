<?php

namespace App\Http\Controllers;

use App\Models\CertificateSignatures;
use App\Models\Department;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // List all certificates
    public function index()
    {
        $certificates = CertificateSignatures::with('department')->get();
        return view('backend.certificates.index', compact('certificates'));
    }

    // Show form to create new certificate signature
    public function create()
    {
        $departments = Department::all();
        return view('backend.certificates.create', compact('departments'));
    }

    // Store new certificate signature
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|unique:certificate_signatures,department_id',
            'name1' => 'required|string',
            'designation1' => 'required|string',
            'signature1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'name2' => 'required|string',
            'designation2' => 'required|string',
            'signature2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $certificate = new CertificateSignatures($request->only(
            'department_id', 'name1', 'designation1', 'name2', 'designation2'
        ));

        if ($request->hasFile('signature1')) {
            $file1 = $request->file('signature1');
            $fileName1 = time() . '_sig1_' . $file1->getClientOriginalName();
            $file1->move(public_path('storage/certificates'), $fileName1);
            $certificate->signature1 = 'certificates/' . $fileName1;
        }

        if ($request->hasFile('signature2')) {
            $file2 = $request->file('signature2');
            $fileName2 = time() . '_sig2_' . $file2->getClientOriginalName();
            $file2->move(public_path('storage/certificates'), $fileName2);
            $certificate->signature2 = 'certificates/' . $fileName2;
        }
 
        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate saved successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $certificate = CertificateSignatures::findOrFail($id);
        $departments = Department::all();
        return view('backend.certificates.edit', compact('certificate', 'departments'));
    }

    // Update certificate signature
    public function update(Request $request, $id)
    {
        $certificate = CertificateSignatures::findOrFail($id);

        $request->validate([
            'department_id' => 'required|unique:certificate_signatures,department_id,' . $certificate->id,
            'name1' => 'required|string',
            'designation1' => 'required|string',
            'signature1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'name2' => 'required|string',
            'designation2' => 'required|string',
            'signature2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $certificate->update($request->only(
            'department_id', 'name1', 'designation1', 'name2', 'designation2'
        ));

        if ($request->hasFile('signature1')) {
            if ($certificate->signature1 && file_exists(public_path('storage/' . $certificate->signature1))) {
                unlink(public_path('storage/' . $certificate->signature1));
            }
            $file1 = $request->file('signature1');
            $fileName1 = time() . '_sig1_' . $file1->getClientOriginalName();
            $file1->move(public_path('storage/certificates'), $fileName1);
            $certificate->signature1 = 'certificates/' . $fileName1;
        }

        if ($request->hasFile('signature2')) {
            if ($certificate->signature2 && file_exists(public_path('storage/' . $certificate->signature2))) {
                unlink(public_path('storage/' . $certificate->signature2));
            }
            $file2 = $request->file('signature2');
            $fileName2 = time() . '_sig2_' . $file2->getClientOriginalName();
            $file2->move(public_path('storage/certificates'), $fileName2);
            $certificate->signature2 = 'certificates/' . $fileName2;
        }

        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    // Delete certificate signature
    public function destroy($id)
    {
        $certificate = CertificateSignatures::findOrFail($id);

        if ($certificate->signature1 && file_exists(public_path('storage/' . $certificate->signature1))) {
            unlink(public_path('storage/' . $certificate->signature1));
        }

        if ($certificate->signature2 && file_exists(public_path('storage/' . $certificate->signature2))) {
            unlink(public_path('storage/' . $certificate->signature2));
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
