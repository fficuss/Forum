<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container_p">
        <div class="icon">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="height: 180px; width: 180px;">
            @else
                <img src="{{ asset('img/profile_icon.png') }}" alt="Icon Text" style="height: 180px; width: 180px;">
            @endif
        </div>
        <div class="nickname">{{ $user->username }}</div>
        @if (Auth::id() === $user->id)
            <div class="edit_profile">
                <a href="{{ url('/editprofile') }}">
                    <img src="{{ asset('img/edit_profile.png') }}" alt="Edit Profile" style="height: 32px; width: 32px;">
                </a>
            </div>
        @endif
        <div class="profile_back"></div>
    </div>
    <div class="site_title1">
        <a href="{{ url('/fanhome') }}">Forum</a>
    </div>
    <div class="content">
        <a href="{{ route('messages.send', $recipient->id) }}">Send Message</a>

        @if (Auth::id() === $user->id)
            <div class="create-post-button">
                <a href="{{ url('/posts/create') }}">Create</a>
            </div>
        @endif
        <h2>{{ $user->username }}'s Posts</h2>
        @foreach($user->posts as $post)
            <div class="posts" id="posts">
                <div class="author_icon">
                    @if ($post->user->profile_picture)
                        <img src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @else
                        <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    @endif
                </div>
                <div class="author_name">
                    <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->username }}</a>
                </div>
                <div class="post_text">
                    <a href="{{ route('posts.show', $post) }}">{{ Str::limit($post->title, 50) }}</a>
                </div>
                <div class="post_excerpt">
                    {{ Str::limit($post->text, 100) }}
                </div>
                @if ($post->image)
                    <div class="post_image">
                        <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="Post Image" style="max-width: 40%; height: auto;">
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
