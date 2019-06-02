@extends('layout.home-layout')
@section('content')

  <div class="container">

      @foreach ($category -> posts as $post)
        <div class="post">
          <h2><a href="{{route('post.id' , $post->id)}}">{{$post -> title}}</a></h2>
          <p>{{$post -> content}}</p>
          <span><b>{{$post -> author -> username}}</b></span>
          <br>
          @foreach ($post->categories as $category)
             <span><a href="{{route('posts.category', $category -> name)}}">{{$category -> name}}</a></span>
           @endforeach

        </div>
      @endforeach

  </div>

@endsection
