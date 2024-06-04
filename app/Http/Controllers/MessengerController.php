<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function showmessages()
    {
        // Fetch chats here
        $chats = Chat::where('user_id', auth()->id())->get();
        
        // Pass the $chats variable to the view
        return view('messenger', compact('chats'));
    }   
    public function sendMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string|max:255',
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Get the authenticated user
        $sender = auth()->user();

        // Save the message to the database
        $message = new Message();
        $message->content = $request->input('message');
        $message->user_id = $sender->id;
        $message->recipient_id = $request->input('recipient_id');
        $message->save();

        // Create or retrieve chat between sender and recipient
        $chat = Chat::where(function ($query) use ($sender, $request) {
            $query->where('sender_id', $sender->id)
                ->where('recipient_id', $request->input('recipient_id'));
        })->orWhere(function ($query) use ($sender, $request) {
            $query->where('sender_id', $request->input('recipient_id'))
                ->where('recipient_id', $sender->id);
        })->firstOrCreate();

        // Attach message to the chat
        $chat->messages()->save($message);

        return response()->json(['success' => true]);
    }

    public function create(User $recipient)
    {
        // Get the authenticated user
        $sender = auth()->user();

        // Create or retrieve the chat between sender and recipient
        $chat = Chat::where(function ($query) use ($sender, $recipient) {
            $query->where('sender_id', $sender->id)
                ->where('recipient_id', $recipient->id);
        })->orWhere(function ($query) use ($sender, $recipient) {
            $query->where('sender_id', $recipient->id)
                ->where('recipient_id', $sender->id);
        })->firstOrCreate();

        return view('messages.create', compact('recipient', 'chat'));
    }


}
