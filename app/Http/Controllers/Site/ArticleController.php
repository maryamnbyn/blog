<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\Http\Controllers\Controller;

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
        $slide_articles = $articles->take(4);
        return view('site.home',compact('articles','slide_articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->storeCount();
        return view('site.articleDetail', compact('article'));
    }


}
