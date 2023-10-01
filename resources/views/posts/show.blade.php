<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="stf-8">
        <title>Blog</title>
        <!--Font-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Title:{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
        </form>
        <div class="footer">
            <a href="/posts/{{ $post->id }}/edit">編集</a></br>
            <a href="/">ブログ投稿一覧画面に戻る</a>
        </div>
    </body>
    <script>
        function deletePost(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){    
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
</html>