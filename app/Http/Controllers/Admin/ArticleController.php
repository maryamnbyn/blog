<?php

namespace App\Http\Controllers\Admin;

use App\article;
use App\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function dashboard()
    {
        return view('adminpannel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('Admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'articlePic' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);

        $title = $request->input('title');

        if ($request->hasFile('articlePic')) {
            $picName = request()->file('articlePic')->store('public/upload', 'asset');
            $articlePic = pathinfo($picName, PATHINFO_BASENAME);
        }

        $body = $request->input('body');
        $category = $request->input('category');
        $articles = new article();
        $articles->category_id = $category;
        $articles->title = $title;
        $articles->article_pic = $articlePic;
        $articles->body = $body;
        auth()->user()->articles()->save($articles);
        return redirect('admin/articles');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $article = article::where('id' , $id );
        return view('site.articleDetail',compact('article'));
        $articles = article::where('id',$id)->first();
        return view('site.article',compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        $categories = category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'      => 'required',
            'articlePic' => 'required',
            'category'   => 'required',
            'body'       => 'required'
        ]);

        $title = $request->input('title');

        if ($request->hasFile('articlePic')) {
            $picName    = request()->file('articlePic')->store('public/upload','asset');
            $articlePic = pathinfo($picName, PATHINFO_BASENAME);
        }

        $body     = $request->input('body');
        $category = $request->input('category');
        $articles = article::find($id);
        $articles->category_id = $category;
        $articles->title       = $title;
        $articles->article_pic = $articlePic;
        $articles->body        = $body;
        auth()->user()->articles()->save($articles);

        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        if ($article != null)
        {
            $article->delete();
            return redirect()->back();
        }
    }
}
