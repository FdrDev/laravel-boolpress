<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Author;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getLatest5Posts(){
      $posts = Post::orderByDesc('updated_at')->take(5)->get();
      $categories = Category::all();
      $authors = Author::all();
      return view('page.home' , compact('posts' , 'categories' , 'authors'));
    }

    function search(Request $request){

      $title = $request -> title;
      $content = $request -> content;
      $category = $request -> category;
      $author = $request -> author;

      $query = Post::query();

      if ($category) {
        $query = Category::findOrFail($category)-> posts();
      }

      if ($title) {
        $query = $query -> where('title' , 'LIKE' , '%' . $title . '%');
      }
      if ($content) {
        $query = $query -> where('content' , 'LIKE' , '%' . $content . '%');
      }
      if ($author) {
        $query = $query -> where('author' , 'LIKE' , '%' . $author . '%');
      }

      $posts = $query->get();

      $categories = Category::all();
      $authors = Author::all();

      return view('page.home' ,  compact('posts' , 'categories' , 'authors'));

    }


}
