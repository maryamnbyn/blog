<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments =Comment::all();
        return view('layouts.index.getcomment',compact('comments'));
    }
    public function store(CommentStoreRequest $request)
    {
        if ($request->ajax()) {
            $request->validated();
            Comment::create([
                'user_id' => Auth::user()->id,
                'article_id' => $request->input('article_id'),
                'body' => $request->input('comment'),
            ]);

        }

    }
}
