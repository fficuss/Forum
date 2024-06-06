<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Theme;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('user')) {
            $user = User::where('username', $request->input('user'))->first();
            if ($user) {
                $query->where('user_id', $user->id);
            }
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        $posts = $query->get();

        if ($request->ajax()) {
            return view('partials.posts', compact('posts'))->render();
        }

        return view('fanhome', compact('posts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_text' => 'required|string',
            'post_images' => 'nullable|array',
            'post_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post;
        $post->title = $request->post_title;
        $post->text = $request->post_text;
        $post->user_id = auth()->id();


        if ($request->hasFile('images')) {
            try {
                $images = $request->file('images');
                Log::info('Uploaded profile picture:', ['filename' => $images->getClientOriginalName()]);
                $imagesPath = $images->store('post_images', 'public');

                $post->images = $imagesPath;
            } catch (\Exception $e) {

                Log::error('Error processing picture: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Error processing picture']);
            }
        }

        $post->save();

        if ($request->post_themes) {
            $themes = explode(',', $request->post_themes);
            foreach ($themes as $themeName) {
                $themeName = trim($themeName, '# ');
                $theme = Theme::firstOrCreate(['name' => $themeName]);
                $post->themes()->attach($theme);
            }
        }


        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id === auth()->id()) {
            $post->delete();
            return redirect()->route('fanhome')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('fanhome')->with('error', 'You are not authorized to delete this post.');
        }
    }

    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        if ($user->likes()->where('post_id', $post->id)->exists()) {
            $user->likes()->where('post_id', $post->id)->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }

        return redirect()->back();
    }
}
