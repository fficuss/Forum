<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('/posts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ route('fanhome') }}">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="author">
            <div class="author_icon">
                @if ($post->user->profile_picture)
                    <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="Profile" class="profile-pic" style="height: 50px; width: 50px;">
                @else
                    <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" class="profile-pic" style="height: 50px; width: 50px; margin-right: 10px;">
                @endif
            </div>
            <div class="author_name">
                <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->username }}</a>
            </div>
        </div>
        <div class="post_title">
            <h1>{{ $post->title }}</h1>
        </div>
        <div class="post_text">
            <p>{!! nl2br(e($post->text)) !!}</p>
        </div>
        <div class="post_themes">
            @foreach ($post->themes as $theme)
                <a href="{{ route('themes.show', $theme) }}">#{{ $theme->name }}</a>
            @endforeach
        </div>
        <div class="post_image">
            @if ($post->images)
                <img src="{{ asset('storage/' . $post->images) }}" alt="Images" class="image">
            @endif
        </div>
        @if (auth()->check() && $post->user_id === auth()->id())
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="deletebtn" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        @endif
        @auth
            <form action="{{ route('posts.like', $post) }}" method="POST">
                @csrf
                <button type="submit">
                    {{ auth()->user()->likes()->where('post_id', $post->id)->exists() ? 'Unlike' : 'Like' }}
                </button>
            </form>
        @else
            <div class="athtolike">
                <p><a href="{{ route('signin') }}">Sign in</a> to like this post.</p>
            </div>
        @endauth

        <div class="like-count">{{ $post->likes()->count() }} likes</div>
    </div>
</body>
</html>
