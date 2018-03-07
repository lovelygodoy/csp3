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

Route::get('/', function () {
    return redirect('/posts');
});

Route::get('/posts', 'PostController@index');

Route::get('/posts/create','PostController@createPost');

Route::get('posts/{post}','PostController@show');

Route::post('/posts/create','PostController@store');

Route::post('/posts/{id}/delete', 'PostController@delete');

Route::post('/posts/{id}/editPost','PostController@update');

Route::post('posts/{id}/comment', 'CommentController@store');

Route::post('/posts/{id}/deleteComment', 'CommentController@delete');

Route::post('/posts/{id}/edit','CommentController@update');


Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'AdminController@show');
Route::post('/admin/{id}/delete', 'AdminController@delete');
Route::post('/admin/{id}/edit','AdminController@update');
Route::post('/admin/create','AdminController@store');




Auth::routes();
Route::get('/home', 'HomeController@index');




 


