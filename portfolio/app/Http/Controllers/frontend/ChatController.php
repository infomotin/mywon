<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
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
