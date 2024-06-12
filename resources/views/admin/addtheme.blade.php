<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Theme</title>
    <link rel="stylesheet" href="{{ asset('/mainpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/admin') }}">Admin Panel</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="container1">
        <div class="register_font">
            <h1>Add Theme</h1>
        </div>
        <form action="{{ route('themes.store') }}" method="POST">
            @csrf
            <div class="Theme_input">
                <input type="text" placeholder="Name" name="name" id="name" required>
            </div>
            <div class="button">
                <button type="submit" class="themebtn">Add Theme</button>
            </div>
        </form>
    </div>
</body>
</html>
