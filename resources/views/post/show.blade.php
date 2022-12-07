@extends('layouts.main')
@section('content')
    <div>
      <h1>{{$post->title}}</h1>
      <p>{{$post->content}}</p>
      <p>{{$post->likes}}</p>
    </div>

  <div>
    <a href="{{route('post.index')}}" class="btn btn-primary">< back</a>
    <a href="{{route('post.edit', $post->id)}}" class="row-item btn btn-warning">edit post</a>
    <form action="{{route('post.delete', $post->id)}}" method="post">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger">delete post</button>
    </form>

  </div>
@endsection