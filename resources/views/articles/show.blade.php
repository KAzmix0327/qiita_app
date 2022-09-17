<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css">
</head>

<body>
{{-- 一覧へ戻るボタン作成 --}}
    <button type="button" onclick="location.href='{{ route('articles.index') }}'">一覧へ戻る</button>
    @if ($article->user->permanent_id === $user->permanent_id)
{{-- 編集ボタン作成 --}}
        <button type="button" onclick="location.href='{{ route('articles.edit', $article->id) }}'">編集する</button>

{{-- 削除ボタン作成 --}}
        <input type="submit" onclick="if(!confirm('削除していいですか？')){return false};" value="削除する" form="delete-form">
        <form action="{{ route('articles.destroy', $article->id) }}" method="post" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    @endif


    <h1>{{ $article->title }}</h1>
    <div class="markdown-body">
        {{-- {!! Str::markdown($article->body, ['html_input' => 'escape']) !!} --}}
        {{-- \cebe\markdownで記述に変更 --}}
        {{ $article->html }}
    </div>
</body>

</html>
