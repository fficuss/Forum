<?php

// app/Http/Controllers/AnswerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request, Discussion $discussion)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $answer = new Answer([
            'content' => $request->text,
            'user_id' => auth()->id(),
            'discussion_id' => $discussion->id,
        ]);

        $answer->save();

        return redirect()->route('discussions.show', $discussion);
    }

    public function storeReply(Request $request, Answer $answer)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $reply = new Answer([
            'content' => $request->text,
            'user_id' => auth()->id(),
            'discussion_id' => $answer->discussion_id,
            'parent_id' => $answer->id, // Ensure it's marked as a reply
        ]);

        $reply->save();

        return redirect()->route('discussions.show', $answer->discussion);
    }
}
