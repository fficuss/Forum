<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/mainpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
        <div class="icons">
            @auth
                <a href="{{ url('/profile') }}">
                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @else
                        <img src="{{ asset('img/default_profile_icon.png') }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @endif
                </a>
                <a href="{{ url('/messenger') }}">
                    <img src="{{ asset('img/messenger.png') }}" alt="Messenger" style="height: 32px; width: 32px;">
                </a>
            @endauth
        </div>
        <div class="LogInButton">
            @guest
                <a href="{{ url('/signin') }}">Sign in</a>
            @endguest
            @auth
                <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
            @endauth
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        @auth
            <div class="create-post-button">
                <button onclick="window.location='{{ url('/posts/create') }}'">Create</button>
            </div>
        @endauth

        @foreach($posts as $post)
            <div class="posts" id="posts">
                <div class="author_icon">
                    @if ($post->user->profile_picture)
                        <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @else
                        <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @endif
                </div>
                <div class="post_content">
                    <div class="author_name">
                        <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->username }}</a>
                    </div>
                    <div class="post_title">
                        <a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 50) }}</a>
                    </div>
                    <div class="post_text">
                        {{ Str::limit($post->text, 100) }}
                    </div>
                    @if ($post->image)
                        <div class="post_image">
                            <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="Post Image" style="max-width: 40%; height: auto;">
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
