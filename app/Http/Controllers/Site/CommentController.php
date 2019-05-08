<?php

namespace App\Http\Controllers\Site;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {
       $this->validate($request,[
           'comment' => 'required',
       ]);
       Comment::create([
           'user_id'   =>Auth::user()->id,
           'article_id'=>$request->input('article_id'),
           'body'      =>$request->input('comment'),
           ]);
        return redirect()->back();
    }


}
