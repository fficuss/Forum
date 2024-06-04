<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('/mainpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
    </div>
    <div class="post_content">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="post-form">
            @csrf
            <div class="form-group">
                <label for="post_title" class="form-label">Post Title: </label>
                <input type="text" placeholder="Title" name="post_title" id="post_title" required>
            </div>
            <div class="form-group">
                <label for="post_text" class="form-label">Post Text: </label>
                <textarea name="post_text" id="post_text" required></textarea>
            </div>
            <div class="form-group">
                <label for="post_image" class="form-label">Post Image: </label>
                <input type="file" name="post_image" id="post_image" class="form-input" accept="image/*" style="display:none;">
            <label for="post_image" class="button-label">Choose File</label>
            </div>
            <button type="submit" class="submitbth">Submit</button>
        </form>
    </div>
</body>
</html>
