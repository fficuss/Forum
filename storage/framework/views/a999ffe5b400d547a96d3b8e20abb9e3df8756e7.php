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
            <a href="<?php echo e(route('fanhome')); ?>">FORUM</a>
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
        <?php if(auth()->check() && $post->user_id === auth()->id()): ?>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('posts.like', $post)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit">
                    <?php echo e(auth()->user()->likes()->where('post_id', $post->id)->exists() ? 'Unlike' : 'Like'); ?>

                </button>
            </form>
        <?php else: ?>
            <p><a href="<?php echo e(route('signin')); ?>">Sign in</a> to like this post.</p>
        <?php endif; ?>

        <div class="like-count"><?php echo e($post->likes()->count()); ?> likes</div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/posts/show.blade.php ENDPATH**/ ?>