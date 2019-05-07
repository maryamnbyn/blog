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

Route::group(['as'=>'admin.','namespace' => 'Admin' ,'prefix' => 'admin' ] ,function(){
    Route::resource('/articles', 'ArticleController')->except('show');
    Route::resource('/category', 'CategoryController')->except('show');;
    Route::resource('/users', 'UserController')->except('show');;
    Route::get('/dashboard', 'UserController@dashboard');
});

//Route site

Route::group(['namespace' => 'Site'] ,function(){
    Route::resource('/articles', 'ArticleController')->only('index','show');
    Route::resource('/category', 'CategoryController')->only('index','show');
    Route::post('/comment', 'CommentController@store')->name('comment.store');
    Route::get('/', 'ArticleController@index');

});


