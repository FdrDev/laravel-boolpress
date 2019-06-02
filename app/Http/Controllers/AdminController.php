<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewPostRequest;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Author;

class AdminController extends Controller
{
    function createNewPost(){
      $post = Post::all();
      $categories = Category::all();
      $authors = Author::all();
      return view('page.new-post', compact('post','categories','authors'));
    }

    function saveNewPost(NewPostRequest $request){
      $validateData = $request -> validated();

      $authorId = $validateData['author_id'];
      $author = Author::find($authorId);

      $categoriesId = $validateData['categories'];
      $categories = Category::find($categoriesId);
      // dd($validateData);

      $post = Post::create($validateData);
      $post->author()->associate($author);
      $post->categories()->attach($categories);

      return redirect('/');
    }

    function editPost($id){
      $post = Post::findOrFail($id);
      $categories = Category::all();
      $authors = Author::all();
      return view('page.edit-post', compact('post','categories','authors'));
    }


    function updatePost(NewPostRequest $request, $id){
      $validateData = $request->validated();

      $post = Post::findOrFail($id);
      $post->update($validateData);

      $categoriesId = $validateData['categories'];
      $categories = Category::find($categoriesId);

      $authorId = $validateData['author_id'];
      $author = Author::find($authorId);

      $post -> categories()->sync($categories);
      $post -> author()->associate($author);
      return redirect('/');

    }
}
