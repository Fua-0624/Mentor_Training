<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="stf-8">
        <title>Blog</title>
        <!--Font-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <h2>タイトル</h2>
            <input type='text' name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
            <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
            <h2>メッセージ</h2>
            <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。">{{ old('post.body') }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
            <input type="submit" value="保存"/> 
        </form> 
        <div class="footer">
            <a href="/">ブログ投稿一覧画面に戻る</a>
        </div>
    </body>
</html>