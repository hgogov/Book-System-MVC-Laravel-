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

Route::get('/books/search/index', 'BooksController@search');

Route::resource('authors', 'AuthorsController');

Route::get('/authors/search/index', 'AuthorsController@search');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('genres', 'GenresController');

Route::get('/genres/search/index', 'GenresController@search');

Route::resource('users', 'UsersController');

Route::get('/users/search/index', 'UsersController@search');

Route::resource('roles', 'RolesController');
