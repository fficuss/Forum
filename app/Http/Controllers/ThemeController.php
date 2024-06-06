<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function show(Theme $theme)
    {
        $posts = $theme->posts()->paginate(10);
        return view('themes.show', compact('theme', 'posts'));
    }
}

