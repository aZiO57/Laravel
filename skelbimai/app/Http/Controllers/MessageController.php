<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($receiverId)
    {
        $data['receiver_id'] = $receiverId;
        return view('message.new', $data);
    }

    public function send(Request $request)
    {
        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->seen = 0;
        $message->save();
    }

    public function inbox()
    {
        $userId = Auth::id();
        $messagesData = Message::where('sender_id', $userId)->orWhere('receiver_id', $userId);
        $messages = [];
        foreach ($messagesData as $message) {
            if ($message->sender_id != $userId) {
                $key = $message->sender_id;
            } else {
                $key = $message->receiver_id;
            }
            $messages[$key] = $message;
        }
        return view('message.inbox', ['messages' => $messages]);
    }

    public function read($chatFriendId)
    {
        $userId = Auth::id();

        $data['receiver'] = User::find($chatFriendId);
        $data['messages'] = Message::where('receiver_id', $chatFriendId)
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->where('sender_id', $chatFriendId)
            ->get();

        $unreadMessages = Message::where('receiver_id', $userId)
            ->where('seen', 0)
            ->get();

        foreach ($unreadMessages as $msg) {
            $msg->seen = 1;
            $msg->save();
        }

        return view('message.read', $data);
    }
}
