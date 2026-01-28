<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    public function ChatInbox()
    {
        // Get all unique sessions with their last message
        $conversations = ChatMessage::select('session_id')
            ->distinct()
            ->get();
            
        return view('backend.chat.index', compact('conversations'));
    }

    public function GetConversation($sessionId)
    {
        $messages = ChatMessage::where('session_id', $sessionId)
            ->orderBy('created_at', 'asc')
            ->get();
            
        // Mark as read
        ChatMessage::where('session_id', $sessionId)
            ->where('sender', 'user')
            ->update(['is_read' => 1]);
            
        return response()->json($messages);
    }

    public function AdminReply(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'session_id' => 'required',
        ]);

        ChatMessage::create([
            'session_id' => $request->session_id,
            'message' => $request->message,
            'sender' => 'admin',
            'created_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }
}
