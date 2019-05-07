<?php

namespace App\Http\Controllers\Site;

use App\article;
use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\DeclareDeclare;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('site.articles',compact('articles'));
    }
    public function show($slug)
    {
        $category = Category::where('slug',$slug )->first();
        $category_id = $category->id;
        $articles = Article::where('category_id',$category_id)->get();

       return view('site.articles-category' ,compact('articles'));
    }


}
