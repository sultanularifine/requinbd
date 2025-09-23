<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
     // Show the contact page
    public function index()
    {
        return view('frontend.pages.contact');
    }

    // Store contact message
   public function store(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    $contact = Contact::create($request->all());

 
    Mail::to('sultanularifine@gmail.com')->send(new ContactMessageMail($contact));

    return redirect()->back()->with('success', 'Message sent successfully!');
}
    
    public function adminIndex()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // Admin: delete message
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
