@extends('layouts.main')
@section('content')
  <div>CreatePost</div>

  <form action="{{route('post.update', $post->id)}}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="title">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" name="content" id="content" rows="3"
                placeholder="content">{{$post->content}}</textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input class="form-control" type="text" name="image" value="{{$post->image}}" id="image" placeholder="image">
    </div>

    <div class="form-group mb-3">
      <label class="form-label" for="exampleFormControlSelect1">Select category</label>
      <select class="form-control" name="category_id" id="exampleFormControlSelect1">
        @foreach($categories as $category)
          <option
                  {{$category->id === $post->category_id ? 'selected' : ''}}
                  value="{{$category->id}}">{{$category->title}}</option>
        @endforeach


      </select>
    </div>
    <div class="form-group mb-3">
      <label class="form-label" for="tags">Tags</label>
      <select multiple class="form-control" name="tags[]" id="tags">
        @foreach($tags as $tag)
          <option
            @foreach($post->tags as $postTag)
            {{$tag->id === $postTag->id ? 'selected' : ''}}
            @endforeach
            value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection