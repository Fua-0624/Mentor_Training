<x-app-layout>
    <x-slot name="header">
        ブログ作成画面
    </x-slot>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <h2>タイトル</h2>
            <input type='text' name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
            <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
            <h2>メッセージ</h2>
            <textarea name="post[body]" placeholder="今日も一日お疲れ様でした。">{{ old('post.body') }}</textarea>
            <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
            <h2>カテゴリー</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select></br>
            <input type="submit" value="保存"/> 
        </form> 
        <div class="footer">
            <a href="/">ブログ投稿一覧画面に戻る</a>
        </div>
</x-app-layout>