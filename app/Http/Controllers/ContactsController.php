<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;


class ContactsController extends Controller
{
    public function submit(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    ContactMessage::create($request->only('name', 'email', 'message'));

    return redirect()->back()->with('success', 'Message sent successfully!');
}
public function index()
    {
        // Return the contact view (assuming your contact form view is located in 'pages.contacts')
        return view('pages.contacts');
    }
}
