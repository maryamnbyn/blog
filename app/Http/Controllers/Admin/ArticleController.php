<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all();
        return view('admin.articles.index', compact('articles'));
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
            'title'      => 'required|unique:articles',
            'articlePic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'   => 'required',
            'body'       => 'required'
        ]);

        $article = Article::create([
            'user_id'     => Auth::user()->id,
            'title'       => $request->input('title'),
            'body'        => $request->input('body'),
        ]);
        $pic = request()->file('articlePic');
        $article->storeFile($pic);
        $article->categories()->attach(request('category'));
        return redirect('admin/articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Article $article)
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

    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ]);
        $article->update([
            'user_id' => (Auth::user()->id),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        $pic = $request->file('articlePic');
        $article->storeFile($pic);
        $article->categories()->sync(request('category'));
        return redirect()->route('admin.articles.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Article $article)
    {
        if ($article != null) {
            $article->delete();
            return redirect()->back();
        }
    }
}
