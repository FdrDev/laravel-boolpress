@extends('layout.home-layout')
@section('content')

  <div class="container">


        <div class="post">
          <h2>{{$post -> title}}</h2>
          <p>{{$post -> content}}</p>
          <span><b>{{$post -> author -> username}}</b></span>
          <br>
          @foreach ($post->categories as $category)
             <span><a href="{{route('posts.category', $category -> name)}}">{{$category -> name}}</a></span>
           @endforeach

        </div>
        <h5><a href="{{route('edit.post' , $post->id)}}">Edit Post</a></h5>

  </div>

@endsection
