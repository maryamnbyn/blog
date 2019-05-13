<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use DemeterChain\A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
       $article = Article::find($id);
        $comments = $article->comments()->latest()->first() ;
//        return view('layouts.index.getcomment',compact('comments'));
        return response()->json([
            'comment' => $comments,

        ]);

    }
    public function store(CommentStoreRequest $request)
    {

            Comment::create([
                'user_id' => Auth::user()->id,
                'article_id' => $request->input('article_id'),
                'body' => $request->input('comment'),
            ]);
        }


}




//namespace App\Http\Controllers\Site;
//
//use App\Article;
//use App\Comment;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\CommentStoreRequest;
//use DemeterChain\A;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class CommentController extends Controller
//{
//    public function index($id)
//    {
//        $article = Article::find($id);
//
//            $comments = $article->comments()->get()->toArray();
//
//
//        return response()->json([
//            'comment' => $comments,
//
//        ]);
//    }
//    public function store(CommentStoreRequest $request)
//    {
//        if ($request->ajax()) {
//           Comment::create([
//                'user_id' => Auth::user()->id,
//                'article_id' => $request->input('article_id'),
//                'body' => $request->input('comment'),
//            ]);
//
//        }
//    }
//}
