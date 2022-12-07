@extends('layouts.main')
@section('content')

  <div>
    <a class="btn btn-success mb-3" href="{{route('post.create')}}">Create post</a>
  </div>
  @foreach($posts as $post)
    <div>
      <h3>
        <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
      </h3>
    </div>
  @endforeach
@endsection