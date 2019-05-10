<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments =Comment::all();
        return view('layouts.index.getcomment',compact('comments'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'comment' => 'required',
            ]);

            Comment::create([
                'user_id' => Auth::user()->id,
                'article_id' => $request->input('article_id'),
                'body' => $request->input('comment'),
            ]);

        }

    }
}
