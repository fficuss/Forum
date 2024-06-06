<!-- resources/views/discussions/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Discussion</title>
    <link rel="stylesheet" href="{{ asset('/discussions.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="post_content">
        <form action="{{ route('discussions.store') }}" method="POST" class="post-form">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Discussion Title: </label>
                <input type="text" placeholder="Title" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="text" class="form-label">Discussion Text: </label>
                <textarea name="text" placeholder="Text" id="text" required></textarea>
            </div>
            <button type="submit" class="submitbtn">Submit</button>
        </form>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
