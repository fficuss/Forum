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
        <div class="figure"></div>
    </div>
    <a href="/admin/dousers">
        <button class="submit" type="submit">Users</button>
    </a>
    <a href="/admin/doposts">
        <button class="submit" type="submit">Posts/Discussions</button>
    </a>
    <a href="/admin/dothemes">
        <button class="submit" type="submit">Themes</button>
    </a>
</body>