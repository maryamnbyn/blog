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
Auth::routes();

//Route Admin


Route::group(['namespace' => 'Admin' ,'prefix' => 'admin' ] ,function(){
    Route::resource('/articles', 'ArticleController');
    Route::resource('/category', 'CategoryController');
    Route::get('/dashboard', 'ArticleController@dashboard');
});

//Route site

Route::group(['namespace' => 'Site'] ,function(){
    Route::resource('/article', 'ArticleController');
    Route::get('/', 'ArticleController@index');

});


