<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($post->title); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
    </div>
    <div class="content">
        <h1><?php echo e($post->title); ?></h1>
        <p><?php echo e($post->text); ?></p>
        <?php if($post->image): ?>
            <div class="post_image">
                <img src="data:image/jpeg;base64,<?php echo e(base64_encode($post->image)); ?>" alt="Post Image" style="max-width: 100%; height: auto;">
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/postshow.blade.php ENDPATH**/ ?>