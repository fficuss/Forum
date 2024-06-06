<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($post->title); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/posts.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(route('fanhome')); ?>">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="author">
            <div class="author_icon">
                <?php if($post->user->profile_picture): ?>
                    <img src="<?php echo e(asset('storage/' . $post->user->profile_picture)); ?>" alt="Profile" class="profile-pic" style="height: 50px; width: 50px;">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" class="profile-pic" style="height: 50px; width: 50px; margin-right: 10px;">
                <?php endif; ?>
            </div>
            <div class="author_name">
                <a href="<?php echo e(route('profile.show', $post->user)); ?>"><?php echo e($post->user->username); ?></a>
            </div>
        </div>
        <div class="post_title">
            <h1><?php echo e($post->title); ?></h1>
        </div>
        <div class="post_text">
            <p><?php echo nl2br(e($post->text)); ?></p>
        </div>
        <div class="post_themes">
            <?php $__currentLoopData = $post->themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('themes.show', $theme)); ?>">#<?php echo e($theme->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="post_image">
            <?php if($post->images): ?>
                <img src="<?php echo e(asset('storage/' . $post->images)); ?>" alt="Images" class="image">
            <?php endif; ?>
        </div>
        <?php if(auth()->check() && $post->user_id === auth()->id()): ?>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="deletebtn" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
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
            <div class="athtolike">
                <p><a href="<?php echo e(route('signin')); ?>">Sign in</a> to like this post.</p>
            </div>
        <?php endif; ?>

        <div class="like-count"><?php echo e($post->likes()->count()); ?> likes</div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/posts/show.blade.php ENDPATH**/ ?>