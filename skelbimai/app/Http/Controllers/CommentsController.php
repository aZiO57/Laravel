<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use App\models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $adComment = new Comment();
        $adComment->user_id = Auth::id();
        $adComment->ad_id = $request->post('ad_id');
        $adComment->message = $request->post('message');

        $adComment->save();
        return redirect('/ad/' . $adComment->ad_id);
    }
}
