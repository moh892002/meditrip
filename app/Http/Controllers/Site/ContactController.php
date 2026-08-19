<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index()
    {
        return view('meditrip.contact-us');
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png,zip', 'max:5120'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('contact-files', 'imageDisk');
        }

        ContactMessage::create($validated);

        return back()->with('success', 'تم إرسال رسالتك بنجاح، سنتواصل معك في أقرب وقت.');
    }
}
