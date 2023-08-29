<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request['user_id'] = 1;
        $posts = Post::create($request->all());
        $fileName = time().'.'.$request->photo->extension();
        $upload = $request->photo->move(public_path('images/'),$fileName);
        if($upload){
            $posts->photo = '/images/'.$fileName;
        }
        $posts->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('backend.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        if($request->hasFile('new_photo')){
            $fileName = time().'.'.$request->new_photo->extension();
            $upload = $request->new_photo->move(public_path('images/'),$fileName);
        if($upload){
            $post->photo = '/images/'.$fileName;
        }
        }else{
            $post->photo = $request->old_photo;
        }
        $post->save();
        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = POST::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
