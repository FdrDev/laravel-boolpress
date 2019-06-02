@extends('layout.home-layout')
@section('content')
<div class="container">

  <div class="edit">
    <form class="" action="{{route('update.post' , $post->id)}}" method="post">
      @csrf
      @method('PATCH')
      <label for="title"><h2>Title</h2></label>
      <input type="text" name="title" value="{{$post->title}}">
      <br>

      <label for="content"><h2>Content</h2></label>
      <textarea name="content" rows="8" cols="80">{{$post->content}}</textarea>
      <br>

      <label for="author_id"><h2>Author</h2></label>
      <select class="" name="author_id">
        @foreach ($authors as $author)
          <option value="{{$author->id}}">{{$author->username}}</option>
        @endforeach
      </select>
      <br>

      <div class="checkbox-cat">
        <label><h1 class="align-self-start">Category</h1></label><br>
        @foreach($categories as $category)
          <input class"" type="checkbox" name="categories[]" value="{{$category->id}}"

              @if($post->categories->contains($category->id))
                checked
              @endif

           >{{$category->name}}<br>
        @endforeach
      </div>
      <br>

      <button type="submit" name="button">Save Changes</button>

    </form>
  </div>

</div>
@endsection
