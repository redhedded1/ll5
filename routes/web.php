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
Route::resource('tags', 'TagsController');

Auth::routes();
Route::get('/account/contacts', 'ContactsController@create')->name('registerUser');
Route::post('/account/contacts', 'ContactsController@store')->name('storeUser');


Route::get('/', 'ArticlesController@index')->name('articles');
Route::get('/unpublished-articles', 'ArticlesController@indexUnPublished')->name('unpublished');

Route::get( '/tags/{tag}', 'TagsController@showTaggedArticles' )->name('articlesTagged');

Route::get('/home', 'HomeController@index')->name('dashboard');
Route::get( '/about', 'HomeController@about' )->name( 'about' );
Route::get( '/contact', 'HomeController@contact' )->name( 'contact' );