<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route Articles
Route::resource('/article', 'ArticleController');
Route::get('/articles/list', 'ArticleController@getArticleList')->name('article.list');

// Route Categories
Route::resource('/category', 'CategoryController');
Route::get('/categories/list', 'CategoryController@getCategoriesList')->name('category.list');

//rout adminpannel
Route::get('/adminpannel', 'controller@showAdminpannel');

//rout index
Route::get('/', 'controller@index');