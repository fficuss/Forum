<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Posts and Discussions</title>
    <link rel="stylesheet" href="{{ asset('/sign-in-up.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="{{ url('/admin') }}">Admin Panel</a>
        <h1>Edit Posts and Discussions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>Post</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
                @foreach ($discussions as $discussion)
                <tr>
                    <td>{{ $discussion->id }}</td>
                    <td>{{ $discussion->title }}</td>
                    <td>Discussion</td>
                    <td>
                        <a href="{{ route('discussions.edit', $discussion->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
