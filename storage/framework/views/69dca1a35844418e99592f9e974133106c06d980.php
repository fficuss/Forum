<style>
    .title {
    margin-left: 40px;
    font-family: 'Roboto', sans-serif;
    font-size: 30px;
    font-weight: bolder;
    position: absolute;
    }   
</style>

<div>
    <?php if($posts->isEmpty() && $discussions->isEmpty()): ?>
        <div class="title">
            <p>No results found.</p>
        </div>
    <?php else: ?>
        <h2>Posts</h2>
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
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <h2>Discussions</h2>
        <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="posts">
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
    <?php endif; ?>
</div><?php /**PATH C:\Users\solov\FanHome\resources\views/partials/search_results.blade.php ENDPATH**/ ?>