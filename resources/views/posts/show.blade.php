<x-app-layout>
    <x-slot name="header">
        ブログ詳細画面
    </x-slot>
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
    <script>
        function deletePost(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){    
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>