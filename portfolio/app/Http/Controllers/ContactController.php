<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Services;
use App\Mail\ContactReply;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $services = Services::all();
        return view('backend.admin.contact.index', compact('contacts', 'services'));
    }
    public function submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        Contact::create($request->all());
        return redirect()->route('home')->with('success', 'Message sent successfully');
    }
    public function reply(Request $request, $id)
    {
        dd($request->all());
        $contact = Contact::findOrFail($id);
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        //Send Email to user
        Mail::to($contact->email)->send(new ContactReply($request->all()));
        return redirect()->route('contact.index')->with('success', 'Message replied successfully');
    }
}
