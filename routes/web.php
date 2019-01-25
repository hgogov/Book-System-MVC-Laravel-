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

/*Route::get('/', function () {
    return view('home.index');
});*/

Route::get('/','BooksController@index');

Route::resource('books', 'BooksController');

Route::resource('authors', 'AuthorsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::post('books/search', 'BooksController@search');