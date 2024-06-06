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
            @if ($post->image)
                <div class="post_image">
                    <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="Post Image" style="max-width: 40%; height: auto;">
                </div>
            @endif
        </div>
    </div>
@endforeach