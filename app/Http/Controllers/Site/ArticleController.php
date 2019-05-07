<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(config('page.paginate_page'));
        return view('site.home',compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id',$id)->first();
        $article->count = $article-> count+1;
        $article->save();
        return view('site.articleDetail', compact('article'));
    }


}