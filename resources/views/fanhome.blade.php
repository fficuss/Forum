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
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" class="profile-pic">
                    @else
                        <img src="{{ asset('img/profile_icon.png') }}" alt="Profile" class="profile-pic">
                    @endif
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
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search posts by title or @username">
            <button onclick="searchPosts()">Search</button>
            <button onclick="toggleFilter()">Filter</button>
        </div>
        <div class="buttons">
            <div class="create-post-button">
                <button onclick="window.location='{{ url('/posts/create') }}'">Create Post</button>
            </div>
            <div class="create-discussion-button">
                <button onclick="window.location='{{ url('/discussions/create') }}'">Create Discussions</button>
            </div>
        </div>
        <div id="posts-container">
            @include('partials.posts', ['posts' => $posts])
            @foreach($discussions as $discussion)
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
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function searchPosts() {
            const query = document.getElementById('search-input').value;
            let url = `{{ url('/posts') }}?`;

            if (query.startsWith('@')) {
                const username = query.substring(1);
                url += `user=${username}`;
            } else {
                url += `title=${query}`;
            }

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('posts-container').innerHTML = data;
            })
            .catch(error => console.error('Error fetching posts:', error));
        }

        function toggleFilter() {
            const filterContainer = document.getElementById('filter-container');
            filterContainer.classList.toggle('active');
        }
    </script>
</body>
</html>
