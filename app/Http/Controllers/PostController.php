<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function getPostById($id){

      $post = Post::findOrFail($id);
      // dd($post);
      return view('page.post', compact('post'));

    }
}
