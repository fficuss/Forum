<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('/posts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    .submitbtn{
        font-family: 'Roboto', sans-serif;
        color: #363438;
        font-size: 30px;
        border: none;
        border-radius: 12px;
        background-color: #ae8595;
        font-weight: bold;
        width: 200px;
        height: 50px;
        display: flex;
        align-items: center; 
        justify-content: center; 
        text-align: center;
        cursor: pointer; 
        margin-left: 40%;
    }
</style>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
        <div class="figure"></div>
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
                <textarea name="post_text" placeholder="Text" id="post_text" required></textarea>
            </div>
            <div class="form-group">
                <label for="post_themes" class="form-label">Post Themes (comma-separated): </label>
                <input type="text" placeholder="#Theme1, #Theme2" name="post_themes" id="post_themes">
            </div>
            <div class="image-container">
                <label for="post_image" class="form-label">Post Image: </label>
                <input type="file" name="images" accept="image/*">
            </div>
            <button class="submitbtn" type="submit">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
