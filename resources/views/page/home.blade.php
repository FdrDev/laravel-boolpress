@extends('layout.home-layout')
@section('content')

  <div class="container">

      @foreach ($posts as $post)
        <div class="post">
          <h2><a href="{{route('post.id' , $post->id)}}">{{$post -> title}}</a></h2>
          <p>{{$post -> content}}</p>
          <span><b>{{$post -> author -> username}}</b></span>
          <br>
           @foreach ($post->categories as $category)
            <span><a href="{{route('posts.category', $category -> name)}}">{{$category -> name}}</span></a>
           @endforeach

        </div>
      @endforeach

      <div class="search">
        <h3>Search</h3>
        <form class="" action="{{route('search')}}" method="get">
          <label for="title"><h5>Title</h5></label>
          <input type="text" name="title" value="">
          <br>
          <br>
          <label for="content"><h5>Content</h5></label>
          <input type="text" name="content" value="">
          <br>
          <br>

          <label for="categories"><h5>Categories</h5></label>
          <select class="" name="categories">
            <option value="">Choose Category</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          <br>
          <br>

          <label for="author_id"><h5>Author</h5></label>
          <select class="" name="author_id">
            <option value="">Choose Author</option>
            @foreach ($authors as $author)
              <option value="{{$author->id}}">{{$author->username}}</option>
            @endforeach
          </select>
          <br>
          <br>

          <button type="submit" name="button">Search</button>
        </form>
      </div>

  </div>

@endsection
