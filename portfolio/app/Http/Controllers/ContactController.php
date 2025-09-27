<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Services;
use App\Mail\ContactReply;
use App\Mail\MailRecved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\SendSMSservice;    
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
        $contact = Contact::create($request->all());
        //Send Email to user
        Mail::to($contact->email)->send(new MailRecved($contact));
        //Send SMS to user
        $sms = new SendSMSservice();
        $message = 'Thank you for your message. We will get back to you soon.';
        $sms->send($contact->phone, $message);
        return redirect()->route('home')->with('success', 'Message sent successfully');
    }
    public function reply(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $reply = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        $reply['contact_id'] = $contact->id;
        $reply['first_name'] = $contact->first_name;
        $reply['last_name'] = $contact->last_name;
        $reply['email'] = $contact->email;
        $reply['phone'] = $contact->phone;
        $reply['user_id'] = Auth::user()->name;
        $reply['status'] = 'Replied';
        //Send Email to user
        Mail::to($contact->email)->send(new ContactReply($reply));
        return redirect()->route('contact.index')->with('success', 'Message replied successfully');
    }
}
