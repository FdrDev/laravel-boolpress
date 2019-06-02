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

Route::get('/' , 'HomeController@getLatest5Posts')->name('home.post');
Route::get('/search' , 'HomeController@search')->name('search');
Route::get('/category/{name}' , 'CategoryController@getCategotyByName')->name('posts.category');
Route::get('/post/{id}' , 'PostController@getPostById')->name('post.id');
Route::get('/admin/post/new' , 'AdminController@createNewPost')->name('new.post');
Route::post('/admin/post/new' , 'AdminController@saveNewPost')->name('save.post');
Route::get('/admin/post/edit{id}' , 'AdminController@editPost')->name('edit.post');
Route::patch('/admin/post/edit{id}' , 'AdminController@updatePost')->name('update.post');
