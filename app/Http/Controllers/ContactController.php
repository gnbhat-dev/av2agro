<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'mobile' => 'nullable|digits:10',
            'message' => 'required|string|max:2000',
        ]);
        $msg = ContactMessage::create($validated);

        Mail::to(config('mail.admin_email'))
            ->send(new ContactFormMail($msg));

        return redirect()->route('contact')->with('success', 'Thank you! We will get back to you soon.');
    }
}
