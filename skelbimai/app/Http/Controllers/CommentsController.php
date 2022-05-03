<?php

namespace App\Http\Controllers;

use App\models\Comment;
use illuminate\support\Facades\Auth;
use App\Http\Requests\CommentsRequest;


class CommentsController extends Controller
{
    public function store(CommentsRequest $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->ad_id = $request->post('ad_id');
        $comment->content = $request->post('content');

        $comment->save();
        return redirect('/ad/' . $comment->ad_id);
    }
}
