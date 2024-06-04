<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        // Check if the user has already liked the post
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('posts.show', $post->id)->with('error', 'You have already liked this post.');
        }

        // Create the like
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post liked successfully.');
    }
}

