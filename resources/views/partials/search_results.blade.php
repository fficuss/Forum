<style>
    .title {
    margin-left: 40px;
    font-family: 'Roboto', sans-serif;
    font-size: 30px;
    font-weight: bolder;
    position: absolute;
    }   
</style>

<div>
    @if($posts->isEmpty() && $discussions->isEmpty())
        <div class="title">
            <p>No results found.</p>
        </div>
    @else
        <h2>Posts</h2>
        @foreach($posts as $post)
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
                </div>
            </div>
        @endforeach

        <h2>Discussions</h2>
        @foreach($discussions as $discussion)
            <div class="posts">
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
    @endif
</div>