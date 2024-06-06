<?php

// DiscussionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('discussions.show', $discussion);
    }

    public function show(Discussion $discussion)
    {
        $discussion->load('answers.user', 'answers.replies.user');
        return view('discussions.show', compact('discussion'));
    }
}