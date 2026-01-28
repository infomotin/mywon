<style>
    #live-chat-widget {
        position: fixed;
        bottom: 90px;
        right: 30px;
        z-index: 9998;
        font-family: Arial, sans-serif;
    }
    #chat-circle {
        background: #007bff;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        line-height: 60px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: transform 0.3s;
    }
    #chat-circle:hover {
        transform: scale(1.1);
    }
    #chat-box {
        display: none;
        width: 300px;
        height: 400px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        flex-direction: column;
        overflow: hidden;
    }
    #chat-header {
        background: #007bff;
        color: white;
        padding: 15px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #chat-messages {
        flex: 1;
        padding: 10px;
        overflow-y: auto;
        background: #f9f9f9;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    #chat-input-area {
        padding: 10px;
        border-top: 1px solid #ddd;
        display: flex;
    }
    #chat-input {
        flex: 1;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 8px 15px;
        outline: none;
    }
    #chat-send {
        background: none;
        border: none;
        color: #007bff;
        font-weight: bold;
        cursor: pointer;
        margin-left: 10px;
    }
    .msg {
        max-width: 80%;
        padding: 8px 12px;
        border-radius: 15px;
        font-size: 14px;
        line-height: 1.4;
    }
    .msg-user {
        background: #007bff;
        color: white;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
    }
    .msg-admin {
        background: #e9ecef;
        color: #333;
        align-self: flex-start;
        border-bottom-left-radius: 2px;
    }
</style>

<div id="live-chat-widget">
    <div id="chat-circle" onclick="toggleChat()">
        <i class="fa fa-comments" style="font-size: 24px;"></i>
    </div>
    <div id="chat-box">
        <div id="chat-header">
            <span>Live Chat</span>
            <span style="cursor: pointer;" onclick="toggleChat()">×</span>
        </div>
        <div id="chat-messages">
            <!-- Messages go here -->
        </div>
        <div id="chat-input-area">
            <input type="text" id="chat-input" placeholder="Type a message...">
            <button id="chat-send" onclick="sendMessage()">Send</button>
        </div>
    </div>
</div>

<script>
    let chatOpen = false;
    let chatPollInterval = null;

    function toggleChat() {
        chatOpen = !chatOpen;
        const circle = document.getElementById('chat-circle');
        const box = document.getElementById('chat-box');
        
        if (chatOpen) {
            circle.style.display = 'none';
            box.style.display = 'flex';
            fetchFrontendMessages();
            chatPollInterval = setInterval(fetchFrontendMessages, 3000);
        } else {
            circle.style.display = 'block';
            box.style.display = 'none';
            if (chatPollInterval) clearInterval(chatPollInterval);
        }
    }

    function fetchFrontendMessages() {
        $.ajax({
            url: '/chat/get-messages',
            method: 'GET',
            success: function(messages) {
                const container = document.getElementById('chat-messages');
                container.innerHTML = '';
                messages.forEach(msg => {
                    const div = document.createElement('div');
                    div.className = 'msg ' + (msg.sender === 'user' ? 'msg-user' : 'msg-admin');
                    div.textContent = msg.message;
                    container.appendChild(div);
                });
                container.scrollTop = container.scrollHeight;
            }
        });
    }

    function sendMessage() {
        const input = document.getElementById('chat-input');
        const message = input.value.trim();
        if (!message) return;

        $.ajax({
            url: '/chat/send',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message: message
            },
            success: function() {
                input.value = '';
                fetchFrontendMessages();
            }
        });
    }

    // Allow enter key
    document.getElementById('chat-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') sendMessage();
    });
</script>
