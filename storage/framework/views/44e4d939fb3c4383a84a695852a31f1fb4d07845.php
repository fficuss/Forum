<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Users</title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <a href="<?php echo e(url('/admin')); ?>">Admin Panel</a>
        <h1>Delete Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td>
                        <form action="<?php echo e(route('users.delete', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
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
<?php /**PATH C:\Users\solov\FanHome\resources\views/admin/deleteuser.blade.php ENDPATH**/ ?>