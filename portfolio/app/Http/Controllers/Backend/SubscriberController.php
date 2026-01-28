<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Jobs\SendNewsletterJob;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->paginate(20);
        return view('backend.admin.subscriber.index', compact('subscribers'));
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber deleted successfully');
    }

    public function newsletter()
    {
        return view('backend.admin.subscriber.newsletter');
    }

    public function sendNewsletter(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $subscribers = Subscriber::where('is_active', true)->get();
        
        // Dispatch job to send emails in background
        dispatch(new SendNewsletterJob($subscribers, $request->subject, $request->message));

        return redirect()->back()->with('success', 'Newsletter sending process started!');
    }
}
