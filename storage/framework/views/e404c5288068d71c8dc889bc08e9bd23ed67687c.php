<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>" alt="Icon Text" style="height: 90px; width: 90px; margin-right: 10px; margin-top: 10px;"></a>
        </div>
        <div class="icons">
            <a href="<?php echo e(url('/profile')); ?>"><img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px; margin-right: 10px;"></a>
            <a href="<?php echo e(url('/messenger')); ?>"><img src="<?php echo e(asset('img/messenger.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px;"></a>
        </div>
        <div class="LogInButton">
            <a href="<?php echo e(url('/register')); ?>">Log In</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="posts" id="posts">
            <div class="author_icon">
                <img src="<?php echo e(asset('images/profile_icon.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px; margin-right: 10px;">
            </div>
            <div class="author_name">
                Author name
            </div>
            <div class="author_id">
                @authorID
            </div>
            <div class="image">
                
            </div>
        </div>
        <div class="posts" id="posts">
            <div class="author_icon">
                <img src="<?php echo e(asset('images/profile_icon.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px; margin-right: 10px;">
            </div>
            <div class="author_name">
                Author name
            </div>
            <div class="author_id">
                @authorID
            </div>
            <div class="post_text">
                Text without image Text without image Text without image Text without image Text without image Text without image Text without image Text without image Text without image Text without image Text without image 
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/fanhome.blade.php ENDPATH**/ ?>