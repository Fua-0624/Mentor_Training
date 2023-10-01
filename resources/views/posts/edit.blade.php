<x-app-layout>
    <x-slot name="header">
        ブログ編集画面
    </x-slot>
        <h1>編集画面</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <h2>タイトル</h2>
            <input type="text" name="post[title]" value="{{ $post->title }}"/>
            <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
            <h2>メッセージ</h2>
            <textarea name="post[body]">{{ $post->body }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
            <input type="submit" value="保存"/>
            <div class="footer">
                <a href="/">ブログ投稿一覧画面に戻る</a>
            </div>
        </form>
</x-app-layout>