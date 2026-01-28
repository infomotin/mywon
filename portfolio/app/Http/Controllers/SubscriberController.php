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
            Subscriber::create([
                'email' => $request->email
            ]);

            // Send Welcome Email
            Mail::to($request->email)->send(new WelcomeSubscriber());

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
}
