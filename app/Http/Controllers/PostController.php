<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //index.blade内でpostsテーブルのデータを扱うときの変数を'posts'とした。posts変数にはインスタンス化された$postが入っている。
    }
    
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(){
        return view('posts.create');
    }
    
    public function store(Post $post, PostRequest $request){
        $input = $request['post'];
        $post -> fill($input) -> save();
        return redirect('/posts/'. $post->id );
    }
    
    public function edit(Post $post){
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request){
        $input = $request['post'];
        $post -> fill($input)->save();
        return redirect('/posts/' . $post->id );
    }
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
}
