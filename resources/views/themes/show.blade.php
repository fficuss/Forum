<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts with Theme: {{ $theme->name }}</title>
    <link rel="stylesheet" href="{{ asset('/mainpage.css') }}"> <!-- Use mainpage.css instead of posts.css -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ route('fanhome') }}">FORUM</a>
        </div>
        <div class="icons">
            @auth
                <a href="{{ route('profile.show', Auth::user()) }}"> <!-- Use route('profile.show', Auth::user()) instead of url('/profile') -->
                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" class="profile-pic">
                    @else
                        <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" class="profile-pic">
                    @endif
                </a>
            @endauth
        </div>
        <div class="LogInButton">
            @guest
                <a href="{{ route('signin') }}">Sign in</a> <!-- Use route('signin') instead of url('/signin') -->
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
        <h1>Posts with Theme: {{ $theme->name }}</h1>
        @foreach ($posts as $post)
            <div class="posts">
                <div class="author">
                    <div class="author_icon">
                        @if ($post->user->profile_picture)
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="Profile" class="profile-pic">
                        @else
                            <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" class="profile-pic">
                        @endif
                    </div>
                    <div class="author_name">
                        <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->username }}</a>
                    </div>
                </div>
                <div class="post_content">
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
        {{ $posts->links() }}
    </div>
</body>
</html>
