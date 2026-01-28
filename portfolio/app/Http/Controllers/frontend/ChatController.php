<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\GuestUser;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function RegisterGuest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $sessionId = Session::getId();

        GuestUser::updateOrCreate(
            ['session_id' => $sessionId],
            [
                'name' => $request->name,
                'email' => $request->email,
            ]
        );

        return response()->json(['status' => 'success']);
    }

    public function CheckGuestStatus()
    {
        $sessionId = Session::getId();
        $exists = GuestUser::where('session_id', $sessionId)->exists();
        return response()->json(['registered' => $exists]);
    }

    public function SendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $sessionId = Session::getId();

        ChatMessage::create([
            'session_id' => $sessionId,
            'message' => $request->message,
            'sender' => 'user',
            'created_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }

    public function GetMessages()
    {
        $sessionId = Session::getId();
        $messages = ChatMessage::where('session_id', $sessionId)
            ->orderBy('created_at', 'asc')
            ->get();
        
        return response()->json($messages);
    }
}
