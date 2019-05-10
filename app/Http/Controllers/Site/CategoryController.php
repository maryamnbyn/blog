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
    public function show(Category $category)
    {
        $articles = $category->articles;
       return view('site.articles-category' ,compact('articles'));
    }


}
