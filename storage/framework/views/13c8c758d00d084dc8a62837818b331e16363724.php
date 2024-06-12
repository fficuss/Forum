<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="<?php echo e(asset('/sign-in-up.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo e($user->email); ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo e($user->username); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/admin/edituser.blade.php ENDPATH**/ ?>