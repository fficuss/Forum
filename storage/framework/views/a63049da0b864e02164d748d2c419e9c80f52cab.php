<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
    </div>
    <div class="content">
        <form action="<?php echo e(route('posts.store')); ?>" method="POST" enctype="multipart/form-data" class="post-form">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" id="post_title" required>
            </div>
            <div class="form-group">
                <label for="post_text">Post Text</label>
                <textarea name="post_text" id="post_text" required></textarea>
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" name="post_image" id="post_image" accept="image/*">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/posts/create.blade.php ENDPATH**/ ?>