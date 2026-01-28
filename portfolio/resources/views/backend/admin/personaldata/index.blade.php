@extends('backend.admin.dashboard')

@section('content')
/*************  ✨ Codeium Command ⭐  *************/
<div class="page-content">
    <div class="chat">
        <div class="chat-header">
            <h5>Chat</h5>
        </div>
        <div class="chat-body">
            @foreach($messages as $message)
                <div class="{{ $message->user_id == auth()->user()->id ? 'message-current' : 'message-other' }}">
                    <div class="message-avatar">
                        <img src="{{ $message->user->profile_photo_url }}" alt="{{ $message->user->name }}">
                    </div>
                    <div class="message-content">
                        <div class="message-header">
                            <span class="message-title">{{ $message->user->name }}</span>
                            <span class="message-time">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="message-body">
                            {{ $message->message }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="chat-footer">
            <form action="#" method="POST">
                @csrf
                <input type="text" name="message" placeholder="Type a message...">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
/******  ea40f2f0-0ac1-4305-aeec-c021a05a9fdf  *******/

@endsection
