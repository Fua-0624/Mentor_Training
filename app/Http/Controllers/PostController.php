<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post){
        $client = new \GuzzleHttp\Client();
        //Clientをインスタンス化
        $url = 'https://teratail.com/api/v1/questions';
        //参照するURLを$urlに入れる
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        //$responseに取ってきたデータが入る
        $questions = json_decode($response->getBody(), true);
        //取得したデータ(JSON型)をPHPファイルに対応した形(連想配列)にする
        return view('posts.index')->with([
            'posts' => $post->getPaginateByLimit(),
            'questions' => $questions['questions'],
            ]);
        //index.blade内でpostsテーブルのデータを扱うときの変数を'posts'とした。posts変数にはインスタンス化された$postが入っている。
    }
    
    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
        //URLで指定したidを持つpostsテーブルのデータが入る変数をpostとした。
    }
    
    public function create(Category $category){
        return view('posts.create')->with(['categories' => $category -> get()]);
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
