<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/messenger.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">Messenger</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="side1" id="side1">
        <h2>Chats</h2>
        @foreach($chats as $chat)
            <div>
                <a href="{{ route('messenger.show', $chat->id) }}">{{ $chat->recipient->username }}</a>
            </div>
        @endforeach
    </div>
    <footer>
        <div id="chat-messages" class="chat-messages">
        @foreach ($messages as $message)
            <div>{{ $message->content }}</div>
        @endforeach
        </div>
        <div class="message_input">
            <input type="message" placeholder="Message" name="msg" id="msg" required>
            <div class="micon">
                <a href="#" onclick="sendMessage()"><img src="{{ asset('img/message.png') }}" alt="Send Icon" style="height: 32px; width: 32px;"></a>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
