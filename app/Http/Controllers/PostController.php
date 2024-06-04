<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_text' => 'required|string',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $post = new Post;
        $post->title = $request->post_title;
        $post->text = $request->post_text;
        $post->user_id = auth()->id();

        if ($request->hasFile('post_image')) {
            // Debugging: Check the contents of the uploaded file
            dd(file_get_contents($request->file('post_image')->getRealPath()));

            // Attempt to save the image to the database
            $post->image = file_get_contents($request->file('post_image')->getRealPath());
        }

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        // Ensure the authenticated user is the author of the post
        if ($post->user_id === auth()->id()) {
            $post->delete();
            return redirect()->route('fanhome')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('fanhome')->with('error', 'You are not authorized to delete this post.');
        }
    }

    public function like(Post $post)
    {
        // Check if the authenticated user has already liked the post
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You have already liked this post.');
        }

        // Create a new like for the post
        $post->likes()->create(['user_id' => auth()->id()]);

        return redirect()->back()->with('success', 'Post liked successfully.');
    }

    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        if ($user->likes()->where('post_id', $post->id)->exists()) {
            // If the like exists, delete it
            $user->likes()->where('post_id', $post->id)->delete();
        } else {
            // If the like doesn't exist, create it
            $post->likes()->create(['user_id' => $user->id]);
        }

        return redirect()->back();
    }

}
