<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('/profile.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container_p">
        <div class="icon">
            <img src="<?php echo e(asset('images/profile_icon.png')); ?>" alt="Icon Text" style="height: 180px; width: 180px;">
        </div>
        <div class="nickname">Nickname</div>
        <div class="edit_profile">
            <a href="<?php echo e(url('/editprofile')); ?>"><img src="<?php echo e(asset('images/edit_profile.png')); ?>" alt="Icon Text" style="height: 32px; width: 32px;"></a>
        </div>
        <div class="profile_back"></div>
    </div>
    <div class="site_title1">
        <a href="<?php echo e(url('/fanhome')); ?>">Forum</a>
    </div>
    <div class="side" id="side"></div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/profile.blade.php ENDPATH**/ ?>