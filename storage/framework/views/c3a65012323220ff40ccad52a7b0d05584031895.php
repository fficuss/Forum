<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

    <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="image-container">
            <button type="button" class="open-popup-button" onclick="openPhotoPopup()">
            <img src="<?php echo e($user->profile_picture ? 'data:image/jpeg;base64,' . base64_encode($user->profile_picture) : asset('img/profile_icon.png')); ?>" alt="Profile Picture" style="height: 180px; width: 180px;">
            </button>
            <div id="photo-popup" class="popup">
                <input type="file" id="file-input" name="profile_picture" accept="image/*" onchange="displayChosenPhoto()"/>
                <button type="button" class="upload-button" onclick="uploadPhoto()">Upload</button>
            </div>
        </div>
        <div class="nickname1">
            <input type="text" placeholder="Nickname" name="username" id="nck" required value="<?php echo e($user->username); ?>">
        </div>
        <button type="submit">Commit Changes</button>
    </form>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/editprofile.blade.php ENDPATH**/ ?>