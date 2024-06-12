<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Discussion</title>
    <link rel="stylesheet" href="{{ asset('/sign-in-up.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="{{ url('/admin') }}">Admin Panel</a>
        <h1>Edit Discussion</h1>
        <form action="{{ route('discussions.update', $discussion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $discussion->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="text" id="content" class="form-control" required>{{ $discussion->text }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
