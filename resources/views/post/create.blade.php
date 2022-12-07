@extends('layouts.main')
@section('content')
  <div>CreatePost</div>

  <form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="title">
      @error('title')
      <p class="text-danger">{{$message}}</p>
      @enderror

    </div>
    <div class="mb-3">

      <label for="content" class="form-label">Content</label>
      <textarea class="form-control" name="content" id="content" rows="3" placeholder="content">{{old('content')}}</textarea>
      @error('content')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-3">

      <label for="image" class="form-label">Image</label>
      <input value="{{old('image')}}" type="text" name="image" class="form-control" id="image" placeholder="image">
      @error('image')
      <p class="text-danger">{{$message}}</p>
      @enderror
    </div>
    <div class="form-group mb-3">
      <label class="form-label" for="exampleFormControlSelect1">Select category</label>
      <select class="form-control" name="category_id" id="exampleFormControlSelect1">
        @foreach($categories as $category)
          <option
                  {{ old('category_id') == $category->id ? 'selected' : '' }}
                  value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mb-3">
      <label class="form-label" for="tags">Tags</label>
      <select multiple class="form-control" name="tags[]" id="tags">
        @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->title}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
@endsection