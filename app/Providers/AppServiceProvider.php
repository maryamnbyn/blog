<?php

namespace App\Providers;

use App\Article;
use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        view()->composer('layouts.index.sidebar', function ($view) {
            $articles = Article::latest()->paginate(config('page.paginate_page'));
            $view_count = Article::orderBy('count', 'DESC')->latest()->paginate(config('page.paginate_page'));
            $view->with(compact('articles','view_count'));
        });
        view()->composer('layouts.index.navbar', function ($view) {
            $categories = Category::all();
            $view->with(compact('categories'));
        });
    }
}
