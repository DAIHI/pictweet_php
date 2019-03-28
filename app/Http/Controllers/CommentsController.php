<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store($tweet_id, Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'tweet_id' => $tweet_id,
            'text' => $request->text,
        ]);

        return redirect("tweets/{$tweet_id}");
    }
}
