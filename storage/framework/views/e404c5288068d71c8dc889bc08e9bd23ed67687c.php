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
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
        <div class="icons">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/profile')); ?>">
                    <?php if(Auth::user()->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . Auth::user()->profile_picture)); ?>" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/default_profile_icon.png')); ?>" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(url('/messenger')); ?>">
                    <img src="<?php echo e(asset('img/messenger.png')); ?>" alt="Messenger" style="height: 32px; width: 32px;">
                </a>
            <?php endif; ?>
        </div>
        <div class="LogInButton">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(url('/signin')); ?>">Sign in</a>
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
        <?php if(auth()->guard()->check()): ?>
            <div class="create-post-button">
                <a href="<?php echo e(url('/posts/create')); ?>">Create</a>
            </div>
        <?php endif; ?>

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="posts" id="posts">
                <div class="author_icon">
                    <?php if($post->user->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . $post->user->profile_picture)); ?>" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" style="height: 32px; width: 32px; margin-right: 10px;">
                    <?php endif; ?>
                </div>
                <div class="author_name">
                    <a href="<?php echo e(route('profile.show', $post->user)); ?>"><?php echo e($post->user->username); ?></a>
                </div>
                <div class="post_text">
                    <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e(Str::limit($post->title, 50)); ?></a>
                </div>
                <div class="post_excerpt">
                    <?php echo e(Str::limit($post->text, 100)); ?>

                </div>
                <?php if($post->image): ?>
                    <div class="post_image">
                        <img src="data:image/jpeg;base64,<?php echo e(base64_encode($post->image)); ?>" alt="Post Image" style="max-width: 40%; height: auto;">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/fanhome.blade.php ENDPATH**/ ?>