<h3>New Contact Message</h3>

<p><b>Name:</b> {{ $contact->name }}</p>
<p><b>Email:</b> {{ $contact->email }}</p>
<p><b>Subject:</b> {{ $contact->subject ?? '-' }}</p>
<p><b>Message:</b></p>
<p>{{ $contact->message }}</p>
