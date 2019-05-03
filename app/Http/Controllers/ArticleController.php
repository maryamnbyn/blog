<?php

namespace App\Http\Controllers;

use App\article;
use App\category;
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
        return view('site.articles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('adminpannel.articles.createArticle', compact('categories'));
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

        if ($request->hasFile('articlePic'))
        {
            $picName = request()->file('articlePic')->store('public/upload');
            $articlePic = pathinfo($picName, PATHINFO_BASENAME);
        }

        $body = $request->input('body');
        $category = $request->input('category');
        $articles = new article();
        $articles->user_id = 1;
        $articles->category_id = $category;
        $articles->title = $title;
        $articles->article_pic = $articlePic;
        $articles->body = $body;
        $articles->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
