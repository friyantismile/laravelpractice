<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all()
        //$posts = Post::orderBy('title','desc')->get();
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::where('title', 'Well')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);

        //$posts = DB::select('SELECT * FROM posts');
        $data = array(
            'title' => 'posts',
            'posts' => $posts
        );
       
        return view('post.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'create post'
        );
       
        return view('post.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        //handle file upload
        $fileNameToStore = "";
        if($request -> hasFile('cover_image')){
            //get filename with extension
            $filenamewtihext = $request->file('cover_image')->getClientOrginalImage();

            //get just filename
            $filename = pathinfo($filenamewtihext, PATHINFO_FILENAME);
            //get just extension
            $fileext = $request->file('cover_image')->getOriginalClientExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$fileext;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore );
        } 

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/post')->with('success', 'post successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = array(
            'title' => 'post',
            'post' => $post
        );
       
        return view('post.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error', 'Unauthorized page!');
        }

        $data = array(
            'title' => 'post',
            'post' => $post
        );
       
        return view('post.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/post')->with('success', 'post successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error', 'Unauthorized page!');
        }

        $post->delete();
        return redirect('/post').with('success', 'Post deleted!');
    }
}
