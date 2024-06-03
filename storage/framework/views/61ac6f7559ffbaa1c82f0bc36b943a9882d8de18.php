<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Message</title>
    <link rel="stylesheet" href="<?php echo e(asset('/messenger.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">Messenger</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="side1" id="side1">
        <!-- Sidebar with user's chats -->
        <h2>Chats</h2>
        <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <a href="<?php echo e(route('messenger.show', $chat->id)); ?>"><?php echo e($chat->recipient->username); ?></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <footer>
        <!-- Form for sending a message -->
        <form action="<?php echo e(route('message.send', $recipient->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="chat-messages" id="chat-messages">
                <!-- Displaying previous messages -->
                <?php $__currentLoopData = $previousMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($message->content); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="message_input">
                <input type="text" placeholder="Message" name="message" id="message" required>
                <!-- Add a hidden input field to pass the recipient's ID -->
                <input type="hidden" name="recipient_id" value="<?php echo e($recipient->id); ?>">
                <div class="micon">
                    <button type="submit"><img src="<?php echo e(asset('img/message.png')); ?>" alt="Send Icon" style="height: 32px; width: 32px;"></button>
                </div>
            </div>
        </form>
    </footer>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/messages/create.blade.php ENDPATH**/ ?>