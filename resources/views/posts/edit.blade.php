@extends('./layouts.app')
@section('content')
<nav aria-label="breadcrumb" class="">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
  </ol>
</nav>

   <div class="cleafix"></div>
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
  <h5 class="card-header"> #Edit Post </h5>
  <div class="card-body">
    <form action="{{route('posts.update',$post->id)}}" method="POST" class="mx-1">
      {{csrf_field()}}
      {{method_field('PUT')}}
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control"  placeholder="Post Title" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label>You Post Content</label>
    <textarea class="form-control"  rows="3" name="body">{{$post->body}}</textarea>
  </div>
  <button type="submit" class="btn btn-success btn-xs">Submit</button>
</form>
  </div>
</div>

@endsection