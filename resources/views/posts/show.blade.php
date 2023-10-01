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
        <div class="footer">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
            <a href="/">ブログ投稿一覧画面に戻る</a>
        </div>
    </body>
</html>