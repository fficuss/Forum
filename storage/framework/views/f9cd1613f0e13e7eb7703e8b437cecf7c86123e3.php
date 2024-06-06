<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($discussion->title); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('/discussions.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="discussion-post">
            <h1><?php echo e($discussion->title); ?></h1>
            <p><?php echo e($discussion->text); ?></p>
        </div>
        <h2 class="answer-title" id="answerButton">Answer this discussion</h2>
        <div class="answer-form" id="answerForm">
            <form action="<?php echo e(route('answers.store', $discussion)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea name="text" placeholder="Your answer" required></textarea>
                </div>
                <button type="submit" class="answersubmitbtn">Submit Answer</button>
            </form>
        </div>
        <div class="answers">
            <?php $__currentLoopData = $discussion->answers->where('parent_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="answer">
                    <p><?php echo e($answer->content); ?></p>
                    <div class="user-info">
                        Answered by: <?php echo e($answer->user->username); ?>

                        <button class="replyButton" data-answer-id="<?php echo e($answer->id); ?>">Reply</button>
                    </div>
                    <div class="reply-form" id="replyForm<?php echo e($answer->id); ?>">
                        <h3>Reply to this answer</h3>
                        <form action="<?php echo e(route('replies.store', ['answer' => $answer->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <textarea name="text" placeholder="Your reply" required></textarea>
                            </div>
                            <button type="submit" class="replysubmitbtn">Submit Reply</button>
                        </form>
                    </div>
                    <div class="replies-container">
                        <?php $__currentLoopData = $answer->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="reply">
                                <p><?php echo e($reply->content); ?></p>
                                <div class="user-info">
                                    Replied by: <?php echo e($reply->user->username); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#answerButton").click(function(){
                $("#answerForm").toggle();
            });
            $(".replyButton").click(function(){
                var answerId = $(this).data('answer-id');
                $("#replyForm" + answerId).toggle();
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/discussions/show.blade.php ENDPATH**/ ?>