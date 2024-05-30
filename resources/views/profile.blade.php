<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container_p">
        <div class="icon">
            <img src="{{ asset('img/profile_icon.png') }}" alt="Icon Text" style="height: 180px; width: 180px;">
        </div>
        <div class="nickname">Nickname</div>
        <div class="edit_profile">
            <a href="{{ url('/editprofile') }}"><img src="{{ asset('img/edit_profile.png') }}" alt="Icon Text" style="height: 32px; width: 32px;"></a>
        </div>
        <div class="profile_back"></div>
    </div>
    <div class="site_title1">
        <a href="{{ url('/fanhome') }}">Forum</a>
    </div>
    <div class="side" id="side"></div>
</body>
</html>
