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
Route::post('posts/delete/{user_id}', 'PostsController@delete')->name('posts.delete');

Route::get('/users/{user_id}', 'UsersController@show')->name('users.show');
Route::get('/users/edit/{user_id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/update', 'UsersController@update')->name('users.update');

Route::get('/likes/posts/{post_id}', 'LikesController@store')->name('likes.store');
Route::get('/likes/delete/{like_id}', 'LikesController@delete')->name('likes.delete');

Route::post('/comments/{comment_id}/store','CommentsController@store')->name('comments.store');
Route::get('/comments/{comment_id}/delete', 'CommentsController@delete')->name('comments.delete');