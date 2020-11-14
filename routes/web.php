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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/new', 'PostsController@new')->name('posts.new');
Route::post('/posts/store', 'PostsController@store')->name('posts.store');

Route::get('/users/{user_id}', 'UsersController@show')->name('users.show');
Route::get('/users/edit/{user_id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/update', 'UsersController@update')->name('users.update');
