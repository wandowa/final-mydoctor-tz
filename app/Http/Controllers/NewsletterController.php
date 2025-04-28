<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        \App\Models\Subscriber::create([
            'email' => $request->email,
        ]);

        Mail::to($request->email)->send(new WelcomeEmail($request->email));

        return redirect()->back()->with('success', 'Thanks for subscribing! Check your inbox for a welcome email.');
    }
}