<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('articles', 'ArticlesController');
Auth::routes();
Route::get('/', 'ArticlesController@index')->name('articles');
Route::get('/unpublished-articles', 'ArticlesController@indexUnPublished')->name('unpublished');
Route::get('/home', 'HomeController@index')->name('dashboard');