<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Discussion</title>
    <link rel="stylesheet" href="<?php echo e(asset('/sign-in-up.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Discussion</h1>
        <form action="<?php echo e(route('discussions.update', $discussion->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo e($discussion->title); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="text" id="content" class="form-control" required><?php echo e($discussion->text); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/admin/editdiscussion.blade.php ENDPATH**/ ?>