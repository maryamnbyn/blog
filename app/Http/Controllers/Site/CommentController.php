<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Events\CommentCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{


public function store(CommentStoreRequest $request)
    {
            $comment =Comment::create([
                'user_id' => Auth::user()->id,
                'article_id' => $request->input('article_id'),
                'body' => $request->input('comment')
            ]);
            event(new CommentCreated($comment ,Auth::user()));

        }


}

