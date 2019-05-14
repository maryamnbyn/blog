<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


public function store(CommentStoreRequest $request)
    {

            Comment::create([
                'user_id' => Auth::user()->id,
                'article_id' => $request->input('article_id'),
                'body' => $request->input('comment')
            ]);
        }


}

