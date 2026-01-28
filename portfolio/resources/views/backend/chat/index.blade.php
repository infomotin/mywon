@extends('backend.admin.index')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row chat-wrapper">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row position-relative">
                        <div class="col-lg-4 chat-aside border-end-lg">
                            <div class="aside-content-header">
                                <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                                    <div class="d-flex align-items-center">
                                        <figure class="me-2 mb-0">
                                            <img src="https://via.placeholder.com/30x30" class="img-sm rounded-circle" alt="profile">
                                            <div class="status online"></div>
                                        </figure>
                                        <div>
                                            <h6>Admin Chat</h6>
                                            <p class="text-muted tx-13">Active Sessions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aside-body">
                                <ul class="list-unstyled chat-list" id="chatList">
                                    @foreach($conversations as $convo)
                                    <li class="chat-item" onclick="loadConversation('{{ $convo->session_id }}', '{{ $convo->name ?? 'Guest User' }}')">
                                        <a href="javascript:;" class="d-flex align-items-center">
                                            <figure class="mb-0 me-2">
                                                <img src="https://via.placeholder.com/30x30" class="img-xs rounded-circle" alt="user">
                                                <div class="status offline"></div>
                                            </figure>
                                            <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                                <div>
                                                    <p class="text-body fw-bolder">{{ $convo->name ?? 'Guest User' }}</p>
                                                    <p class="text-muted tx-13">{{ $convo->email ?? 'No Email' }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 chat-content">
                            <div class="chat-header border-bottom pb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="me-2 icon-md" data-feather="message-square"></i>
                                        <div>
                                            <h6 id="currentChatUser">Select a conversation</h6>
                                            <p class="text-muted tx-13" id="currentChatStatus"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-body" id="chatBody" style="height: 400px; overflow-y: scroll;">
                                <!-- Messages will load here -->
                                <p class="text-center mt-5">Select a user from the list to start chatting</p>
                            </div>
                            <div class="chat-footer d-flex">
                                <input type="hidden" id="currentSessionId">
                                <input type="text" class="form-control me-2" id="adminMessageInput" placeholder="Type a message...">
                                <button type="button" class="btn btn-primary d-flex align-items-center" onclick="sendAdminMessage()">
                                    <i class="icon-md" data-feather="send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    let currentSessionId = null;
    let pollInterval = null;

    function loadConversation(sessionId, guestName) {
        currentSessionId = sessionId;
        $('#currentSessionId').val(sessionId);
        $('#currentChatUser').text(guestName);
        
        fetchMessages();
        
        // Clear previous interval
        if (pollInterval) clearInterval(pollInterval);
        // Start polling
        pollInterval = setInterval(fetchMessages, 3000);
    }

    function fetchMessages() {
        if (!currentSessionId) return;

        $.ajax({
            url: '/admin/chat/get-messages/' + currentSessionId,
            method: 'GET',
            success: function(messages) {
                let html = '<ul class="list-unstyled">';
                messages.forEach(function(msg) {
                    let isMe = msg.sender === 'admin';
                    let align = isMe ? 'flex-row-reverse' : '';
                    let bg = isMe ? 'bg-primary text-white' : 'bg-light text-dark';
                    
                    html += `
                        <li class="d-flex justify-content-start mb-3 ${align}">
                            <div class="chat-body mx-2">
                                <div class="p-3 rounded ${bg}">
                                    <p>${msg.message}</p>
                                </div>
                                <small class="text-muted">${new Date(msg.created_at).toLocaleTimeString()}</small>
                            </div>
                        </li>
                    `;
                });
                html += '</ul>';
                $('#chatBody').html(html);
                // Scroll to bottom
                // var chatBody = document.getElementById('chatBody');
                // chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    }

    function sendAdminMessage() {
        let message = $('#adminMessageInput').val();
        if (!message || !currentSessionId) return;

        $.ajax({
            url: '/admin/chat/reply',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message: message,
                session_id: currentSessionId
            },
            success: function(response) {
                $('#adminMessageInput').val('');
                fetchMessages();
            }
        });
    }
    
    // Allow enter key
    $('#adminMessageInput').keypress(function(e) {
        if(e.which == 13) {
            sendAdminMessage();
        }
    });
</script>

@endsection
