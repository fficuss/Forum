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
        <div class="profile_back"></div>
    </div>
    <div class="site_title1">
        <a href="<?php echo e(url('./fanhome')); ?>">Forum</a>
    </div>
    <div class="side" id="side"></div>
    <div class="e_title">Edit profile</div>

    <div class="image-container">
        <button class="open-popup-button" onclick="openPhotoPopup()"><img src="<?php echo e(asset('images/profile_icon.png')); ?>" alt="Icon Text" style="height: 180px; width: 180px;"></button>
        <div id="photo-popup" class="popup">
            <input type="file" id="file-input" accept="image/*" onchange="displayChosenPhoto()"/>
            <button class="upload-button" onclick="uploadPhoto()">Upload</button>
        </div>
    </div>
    <div class="nickname1"><input type="text" placeholder="Nickname" name="nck" id="nck" required></div>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/editprofile.blade.php ENDPATH**/ ?>