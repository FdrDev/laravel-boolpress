@extends('layout.home-layout')
@section('content')
<div class="container">

  <div class="edit">
    <form class="" action="{{route('save.post')}}" method="post">
      @csrf
      <label for="title"><h2>Title</h2></label>
      <br>
      <input type="text" name="title" value="">
      <br>

      <label for="content"><h2>Content</h2></label>
      <br>
      <textarea name="content" rows="8" cols="80"></textarea>
      <br>

      <label for="author_id"><h2>Author</h2></label>
      <br>
      <select class="" name="author_id">
        @foreach ($authors as $author)
          <option value="{{$author->id}}">{{$author->username}}</option>
        @endforeach
      </select>
      <br>
      <br>

      <div class="checkbox-cont">
        <label for="categories"><h2>Categories</h2></label>
        <br>
        @foreach ($categories as $category)
          <input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}
          <br>
        @endforeach
      </div>
      <br>

      <button type="submit" name="button">Save New Post</button>

    </form>
  </div>

</div>
@endsection
