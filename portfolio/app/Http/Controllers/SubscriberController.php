<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Mail\WelcomeSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $subscriber = Subscriber::create([
                'email' => $request->email
            ]);

            // Send Welcome Email
            Mail::to($request->email)->send(new WelcomeSubscriber($subscriber));

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for subscribing! Please check your email.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    public function unsubscribe($email, $token)
    {
        $subscriber = Subscriber::where('email', $email)->where('token', $token)->first();

        if ($subscriber) {
            $subscriber->is_active = false;
            $subscriber->save();

            return view('frontend.unsubscribe_success');
        }

        return view('frontend.unsubscribe_fail');
    }
}
