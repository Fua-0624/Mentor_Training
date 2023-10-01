<x-app-layout>
    <x-slot name="header">
        ブログ投稿一覧画面
    </x-slot>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <a href="/posts/{{ $post->id }}" class='title'>{{ $post->title }}</a>
                <p class='body'>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            </div></br>
            @endforeach
        </div></br></br>
        <div class="questions">
            @foreach($questions as $question)
            <div>
                <a href="https://teratail.com/questions/{{ $question['id'] }}">{{ $question['title'] }}</a>
            </div>
            @endforeach</br>
        </div>
        <p>ログインユーザー：{{ Auth::user()->name }}</p>
        <a href="/posts/create">create</a>
        <div vlass="paginate">
            {{ $posts->links() }}
        </div>
</x-app-layout>