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
        <div class="figure"></div>
    </div>
    <div class="container1">
        <div class="register_font">
            <h1>Add User</h1>
        </div>
        <?php echo csrf_field(); ?>
        <div class="email_input">
            <input type="email" placeholder="Email" name="email" id="email" required>
        </div>
        <div class="username_input">
            <input type="text" placeholder="Username" name="usr" id="usr" required>
        </div>
        <div class="password_input">
            <input type="password" placeholder="Password" name="psw" id="psw" required>
        </div>
        <div class="register_button">
            <button type="submit" class="registerbtn">Add User</button>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views//admin/adduser.blade.php ENDPATH**/ ?>