<?php

namespace App\Http\Controllers\Site;

use App\category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $articles = $category->articles;
        return view('site.articles-category' ,compact('articles','category'));
    }


}
