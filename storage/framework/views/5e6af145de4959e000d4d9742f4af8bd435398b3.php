<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo e(asset('/profile.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    .create-post-button button{
        font-family: 'Roboto', sans-serif;
        color: #363438;
        font-size: 20px;
        text-align: center;
        border: none;
        border-radius: 12px;
        background-color: #ae8595;
        font-weight: bold;
        width: 150px;
        height: 50px;
    }
</style>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="container_p">
        <div class="icon">
            <?php if($user->profile_picture): ?>
                <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>" alt="Profile Picture" class="large-profile-pic">
            <?php else: ?>
                <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Icon Text" class="large-profile-pic">
            <?php endif; ?>
        </div>
        <div class="nickname"><?php echo e($user->username); ?></div>
        <?php if(Auth::id() === $user->id): ?>
            <div class="edit_profile">
                <a href="<?php echo e(url('/editprofile')); ?>">
                    <img src="<?php echo e(asset('img/edit_profile.png')); ?>" alt="Edit Profile" style="height: 32px; width: 32px;">
                </a>
            </div>
        <?php endif; ?>
        <div class="profile_back"></div>
    </div>
    <div class="content">
        <?php if(auth()->guard()->check()): ?>
            <div class="buttons">
                <div class="create-post-button">
                    <button onclick="window.location='<?php echo e(url('/posts/create')); ?>'">Create Post</button>
                </div>
                <div class="create-discussion-button">
                    <button onclick="window.location='<?php echo e(url('/discussions/create')); ?>'">Create Discussions</button>
                </div>
            </div>
        <?php endif; ?>
        <h2><?php echo e($user->username); ?>'s Posts</h2>
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

        <h2><?php echo e($user->username); ?>'s Discussions</h2>
        <?php $__currentLoopData = $user->discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="posts" id="posts">
                <div class="author">
                    <div class="author_icon">
                        <?php if($discussion->user->profile_picture): ?>
                            <img src="<?php echo e(asset('storage/' . $discussion->user->profile_picture)); ?>" alt="Profile" class="profile-pic">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" class="profile-pic">
                        <?php endif; ?>
                    </div>
                    <div class="author_name">
                        <a href="<?php echo e(route('profile.show', $discussion->user)); ?>"><?php echo e($discussion->user->username); ?></a>
                    </div>
                </div>
                <div class="post_content">
                    <div class="post_title">
                        <a href="<?php echo e(route('discussions.show', $discussion)); ?>"><?php echo e(Str::limit($discussion->title, 50)); ?></a>
                    </div>
                    <div class="post_text">
                        <?php echo e(Str::limit($discussion->text, 100)); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/profile.blade.php ENDPATH**/ ?>