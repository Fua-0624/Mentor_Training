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
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <a href="/posts/{{ $post->id }}" class='title'>{{ $post->title }}</a>
                <p class='body'>{{ $post->body }}</p>
            </div>
            @endforeach
        </div>
        <a href="/posts/create">create</a>
        <div vlass="paginate">
            {{ $posts->links() }}
        </div>
    </body>
</html>