<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Discussion;

class MainController extends Controller
{
    public function showmain()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $discussions = Discussion::orderBy('created_at', 'desc')->get();
        return view('fanhome', compact('posts', 'discussions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_text' => 'required|string|max:1000',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = null;
        if ($request->hasFile('post_image')) {
            $image = file_get_contents($request->file('post_image')->getRealPath());
        }

        Post::create([
            'text' => $request->post_text,
            'image' => $image,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = collect();
        $discussions = collect();

        if ($query) {
            $posts = Post::where('title', 'like', "%{$query}%")->get();
            $discussions = Discussion::where('title', 'like', "%{$query}%")->get();
        }

        if ($request->ajax()) {
            return view('partials.search_results', compact('posts', 'discussions'))->render();
        }

        return view('fanhome', compact('posts', 'discussions'));
    }
    
}
