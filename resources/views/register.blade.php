<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/sign-in-up.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="{{ url('/fanhome') }}">Forum</a>
        </div>
        <div class="icons">
            <a href="{{ url('/profile') }}"><img src="{{ asset('img/profile_icon.png') }}" alt="Icon Text" style="height: 32px; width: 32px;"></a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="container1">
        <div class="register_font">
            <h1>Log In</h1>
        </div>
        <div class="email_input">
            <input type="email" placeholder="Email" name="email" id="email" required>
        </div>
        <div class="username_input">
            <input type="username" placeholder="Username" name="usr" id="usr" required>
        </div>
        <div class="password_input">
            <input type="password" placeholder="Password" name="psw" id="psw" required>
        </div>
        <div class="register_button">
            <a href="{{ url('/profile') }}">
                <button type="submit" class="registerbtn">Register</button>
            </a>
        </div>
    </div>
    <div class="container_signin">
        <p>Already have an account? <a href="{{ url('/signin') }}">Sign in</a>.</p>
    </div>
</body>
</html>
