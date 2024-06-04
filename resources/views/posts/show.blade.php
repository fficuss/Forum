<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('/mainpage.css') }}">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ route('fanhome') }}">FORUM</a>
        </div>
    </div>
    <div class="content">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->text }}</p>
        @if ($post->image)
            <div class="post_image">
                <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="Post Image" style="max-width: 100%; height: auto;">
            </div>
        @endif
        @if (auth()->check() && $post->user_id === auth()->id())
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
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
            <p><a href="{{ route('signin') }}">Sign in</a> to like this post.</p>
        @endauth

        <div class="like-count">{{ $post->likes()->count() }} likes</div>
    </div>
</body>
</html>
