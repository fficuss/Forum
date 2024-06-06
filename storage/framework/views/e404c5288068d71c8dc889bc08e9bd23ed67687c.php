<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('/mainpage.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="site_title">
            <a href="<?php echo e(url('/fanhome')); ?>">FORUM</a>
        </div>
        <div class="icons">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/profile')); ?>">
                    <?php if(Auth::user()->profile_picture): ?>
                        <img src="<?php echo e(asset('storage/' . Auth::user()->profile_picture)); ?>" alt="Profile" class="profile-pic">
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/profile_icon.png')); ?>" alt="Profile" class="profile-pic">
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="LogInButton">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(url('/signin')); ?>">Sign in</a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <form id="logout-form" action="<?php echo e(route('signout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
            <?php endif; ?>
        </div>
        <div class="figure"></div>
    </div>
    <div class="content">
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search posts by title or @username">
            <button onclick="searchPosts()">Search</button>
            <button onclick="toggleFilter()">Filter</button>
        </div>
        <div class="buttons">
            <div class="create-post-button">
                <button onclick="window.location='<?php echo e(url('/posts/create')); ?>'">Create Post</button>
            </div>
            <div class="create-discussion-button">
                <button onclick="window.location='<?php echo e(url('/discussions/create')); ?>'">Create Discussions</button>
            </div>
        </div>
        <div id="posts-container">
            <?php echo $__env->make('partials.posts', ['posts' => $posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    </div>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <script>
        function searchPosts() {
            const query = document.getElementById('search-input').value;
            let url = `<?php echo e(url('/posts')); ?>?`;

            if (query.startsWith('@')) {
                const username = query.substring(1);
                url += `user=${username}`;
            } else {
                url += `title=${query}`;
            }

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('posts-container').innerHTML = data;
            })
            .catch(error => console.error('Error fetching posts:', error));
        }

        function toggleFilter() {
            const filterContainer = document.getElementById('filter-container');
            filterContainer.classList.toggle('active');
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\solov\FanHome\resources\views/fanhome.blade.php ENDPATH**/ ?>