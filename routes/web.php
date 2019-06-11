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

Route::get('/', 'MainController@getLatest5Posts')->name('home.post');

// Route::get('/home' , 'HomeController@getLatest5Posts')->name('home.post');
Route::get('/search' , 'MainController@search')->name('search');
Route::get('/category/{name}' , 'CategoryController@getCategotyByName')->name('posts.category');
Route::get('/post/{id}' , 'PostController@getPostById')->name('post.id');
Route::get('/admin/post/new' , 'HomeController@createNewPost')->name('new.post');
Route::post('/admin/post/new' , 'HomeController@saveNewPost')->name('save.post');
Route::get('/admin/post/edit{id}' , 'HomeController@editPost')->name('edit.post');
Route::patch('/admin/post/edit{id}' , 'HomeController@updatePost')->name('update.post');

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
