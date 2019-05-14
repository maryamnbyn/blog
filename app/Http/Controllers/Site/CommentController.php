<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Mail\CommentCreated;
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

            Mail::to(Auth::user())->send(new CommentCreated($comment));

        }


}

