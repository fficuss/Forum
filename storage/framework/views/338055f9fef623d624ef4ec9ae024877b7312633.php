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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\solov\FanHome\resources\views/partials/posts.blade.php ENDPATH**/ ?>