@extends('./layouts.app')
@section('content')
   <h4>Welcome {{auth()->user()->name}} as {{auth()->user()->getRoleNames()}}</h4>
    <div class="card">
  <div class="card-header">
   <div class="d-flex justify-content-between">
     <div class="title ml-3">
       All Post Title
     </div>
       <div class=" mr-3">
         @role('writer|admin')
       <a href="{{route('posts.create')}}" class="text-dark">
      <i class="far fa-plus-square fa-2x"></i>
      </a>
      @endrole
     </div>
   </div>
  </div>
  <div class="card-body">
    <ul>
    
@foreach ($posts as $post)

 <li class="my-1">
    <div class="d-flex justify-content-between">
      <div>{{$post->id}}
 {{$post->title}}
 <span style="font-size:.5rem;color:grey; margin-left:10px;">
 {{$post->created_at->format('F d,Y h:ia ')  }}</span>
      </div>
     <div>
       <div class="d-flex justify-content-between">
         @role('editor|admin')
         <div>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success text-white mx-1">
        <i class="fas fa-pen-square"></i>
        </a>
         </div>
         @endrole
 @role('admin')        
<div>
  <form action="{{route('posts.destroy',$post->id)}}" method="POST">
  {{csrf_field()}}
  {{method_field('DELETE')}}
  <button type="submit" class="btn btn-danger">
    <i class="fas fa-times-circle text-white"></i>
  </button>
  </form>
</div>
@endrole
       </div>
     </div>
    </div>
   
 </li>

@endforeach
</ul>
<div class="text-center">
 {!! $posts->links() !!}
</div>
  </div>
</div> 
   
@endsection