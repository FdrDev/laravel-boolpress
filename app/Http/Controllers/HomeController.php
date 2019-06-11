<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewPostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function createNewPost(){
        $post = Post::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('page.new-post', compact('post','categories','authors'));
    }

    function saveNewPost(NewPostRequest $request){

      $validateData = $request -> validated();

      $categoriesId = $validateData['categories'];
      $categories = Category::find($categoriesId);
      // dd($validateData);

      $post = Post::create($validateData);
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

      $post -> categories()->sync($categories);
      return redirect('/');

    }

    function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }


}
