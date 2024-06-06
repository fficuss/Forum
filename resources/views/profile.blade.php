<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    .create-post-button button{
        font-family: 'Roboto', sans-serif;
        color: #363438;
        font-size: 20px;
        text-align: center;
        border: none;
        border-radius: 12px;
        background-color: #ae8595;
        font-weight: bold;
        width: 150px;
        height: 50px;
    }
</style>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="container_p">
        <div class="icon">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="large-profile-pic">
            @else
                <img src="{{ asset('img/profile_icon.png') }}" alt="Icon Text" class="large-profile-pic">
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
    <div class="content">
        @auth
            <div class="buttons">
                <div class="create-post-button">
                    <button onclick="window.location='{{ url('/posts/create') }}'">Create Post</button>
                </div>
                <div class="create-discussion-button">
                    <button onclick="window.location='{{ url('/discussions/create') }}'">Create Discussions</button>
                </div>
            </div>
        @endauth
        <h2>{{ $user->username }}'s Posts</h2>
        @foreach($user->posts as $post)
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

        <h2>{{ $user->username }}'s Discussions</h2>
        @foreach($user->discussions as $discussion)
            <div class="posts" id="posts">
                <div class="author">
                    <div class="author_icon">
                        @if ($discussion->user->profile_picture)
                            <img src="{{ asset('storage/' . $discussion->user->profile_picture) }}" alt="Profile" class="profile-pic">
                        @else
                            <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" class="profile-pic">
                        @endif
                    </div>
                    <div class="author_name">
                        <a href="{{ route('profile.show', $discussion->user) }}">{{ $discussion->user->username }}</a>
                    </div>
                </div>
                <div class="post_content">
                    <div class="post_title">
                        <a href="{{ route('discussions.show', $discussion) }}">{{ Str::limit($discussion->title, 50) }}</a>
                    </div>
                    <div class="post_text">
                        {{ Str::limit($discussion->text, 100) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
