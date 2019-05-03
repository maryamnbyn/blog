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

Route::get('/', 'controller@index');
Route::get('/adminpannel', 'controller@showAdminpannel');
Route::resource('/article', 'ArticleController');
Route::resource('/category', 'CategoryController');
Route::get('/categories/list', 'CategoryController@getCategoriesList')->name('category.list');

