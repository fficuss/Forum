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
            <h1>Add Theme</h1>
        </div>
        <?php echo csrf_field(); ?>
        <div class="Theme_input">
            <input type="text" placeholder="Name" name="usr" id="usr" required>
        </div>
        <div class="button">
            <button type="submit" class="themebtn">Add Theme</button>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views//admin/addtheme.blade.php ENDPATH**/ ?>