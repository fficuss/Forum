<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Posts and Discussions</title>
    <link rel="stylesheet" href="<?php echo e(asset('/sign-in-up.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Delete Posts and Discussions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($post->id); ?></td>
                    <td><?php echo e($post->title); ?></td>
                    <td>Post</td>
                    <td>
                        <form action="<?php echo e(route('posts.delete', $post->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($discussion->id); ?></td>
                    <td><?php echo e($discussion->title); ?></td>
                    <td>Discussion</td>
                    <td>
                        <form action="<?php echo e(route('discussions.delete', $discussion->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/admin/deletepost.blade.php ENDPATH**/ ?>