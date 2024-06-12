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
            <a href="{{ url('/admin') }}">Admin Panel</a>
        </div>
        <div class="figure"></div>
    </div>
    <a href="/admin/deletepost">
        <button class="submit" type="submit">Delete Post or Discussion</button>
    </a>
    <a href="/admin/changecontent">
        <button class="submit" type="submit">Change Content</button>
    </a>
</body>