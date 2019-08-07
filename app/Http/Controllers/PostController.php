<?php

namespace App\Http\Controllers;
use Session;
use App\Post;
use Illuminate\Http\Request;
use Auth;
//Importing laravel-permission models
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:writer|admin',['only'=>['create']]);
        $this->middleware('role:editor|admin',['only'=>['edit']]);
        $this->middleware('role:admin',['only'=>['destroy']]);
    }
    public function index()
    {
        $posts = Post::orderby('id','asc')->paginate(5);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $this->validate($request,[
         'title'=>'required',
         'body'=>'required'  
        ]);
        $post->create($request->all());
        Session::flash('success','Your New Post Store Successfully');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

      return view('posts.edit',compact('post'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //  $po = Post::find($id);
        $this->validate($request,[
            "title"=>"required",
            "body"=> "required"
        ]);
        $post->update($request->all());
        Session::flash('success','Your Post Data Updated');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success','Your Post Data Deleted');
        return redirect()->route('posts.index');
    }
}
