<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('/sign-in-up.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">Forum</a>
        </div>
        <div class="icons">
            <a href="<?php echo e(url('/profile')); ?>">
                <img src="<?php echo e(asset('images/profile_icon.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px;">
            </a>
        </div>
        <div class="figure"></div>
    </div>
    
    <div class="container2">
        <div class="signin_font">
            <h1>Sign In</h1>
        </div>
        <div class="email_input">
            <input type="email" placeholder="Email or Username" name="email" id="email" required>
        </div>
        <div class="password_input">
            <input type="password" placeholder="Password" name="psw" id="psw" required>
        </div>
        <div class="signin_button">
            <a href="<?php echo e(url('/profile')); ?>">
                <button type="submit" class="registerbtn">Sign In</button>
            </a>
        </div>
    </div>
  
    <div class="container_signin">
        <p>New here? <a href="<?php echo e(url('/register')); ?>">Log In</a>.</p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/signin.blade.php ENDPATH**/ ?>