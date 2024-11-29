<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Mail\InquiryReceived;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'phone' => 'required',
            'message' => 'required|max:500',
        ]);

        $inquiry = Inquiry::create($validated);

        Mail::to('support@a4n8.com')->send(new InquiryReceived($inquiry));

        return redirect('/contact')->with('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    }
    public function show()
    {
        return Inertia::render('ContactForm');
    }
}
