@extends('./layouts.app')
@section('content')
<nav aria-label="breadcrumb" class="">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
  </ol>
</nav>

@if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
      @endforeach
      </ul>
    </div>
@endif
<div class="card">
  <h5 class="card-header"> #New Post Add</h5>
  <div class="card-body">
        <form action="{{route('posts.store')}}" method="POST" class="mx-1">
      {{csrf_field()}}
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control"  placeholder="Post Title" name="title" value="{{old('title')}}">
  </div>
  <div class="form-group">
    <label>You Post Content</label>
    <textarea class="form-control"  rows="3" name="body">{{old('body')}}</textarea>
  </div>
  <button type="submit" class="btn btn-success btn-xs">Submit</button>
</form>
  </div>
</div>



   <div class="cleafix"></div>

@endsection