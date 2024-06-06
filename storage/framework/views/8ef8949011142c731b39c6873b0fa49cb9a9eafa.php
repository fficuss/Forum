<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts with Theme: <?php echo e($theme->name); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(route('fanhome')); ?>">FORUM</a>
        </div>
        <div class="icons">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('profile.show', Auth::user())); ?>">
                    <?php if(Auth::user()->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . Auth::user()->profile_picture)); ?>" alt="Profile" class="profile-pic">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" class="profile-pic">
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="LogInButton">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('signin')); ?>">Sign in</a> 
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <form id="logout-form" action="<?php echo e(route('signout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
            <?php endif; ?>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <h1>Posts with Theme: <?php echo e($theme->name); ?></h1>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="posts">
                <div class="author">
                    <div class="author_icon">
                        <?php if($post->user->profile_picture): ?>
                            <img src="<?php echo e(asset('storage/' . $post->user->profile_picture)); ?>" alt="Profile" class="profile-pic">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" class="profile-pic">
                        <?php endif; ?>
                    </div>
                    <div class="author_name">
                        <a href="<?php echo e(route('profile.show', $post->user)); ?>"><?php echo e($post->user->username); ?></a>
                    </div>
                </div>
                <div class="post_content">
                    <div class="post_title">
                        <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e(Str::limit($post->title, 50)); ?></a>
                    </div>
                    <div class="post_text">
                        <?php echo e(Str::limit($post->text, 100)); ?>

                    </div>
                    <?php if($post->image): ?>
                        <div class="post_image">
                            <img src="data:image/jpeg;base64,<?php echo e(base64_encode($post->image)); ?>" alt="Post Image" style="max-width: 40%; height: auto;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($posts->links()); ?>

    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/themes/show.blade.php ENDPATH**/ ?>