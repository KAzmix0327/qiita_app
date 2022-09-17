<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    <h1>記事一覧</h1>
{{-- 一覧画面でフラッシュメッセージを表示 --}}
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif

    @if (!empty($articles))
        <ul>
            @foreach ($articles as $article)
                <li>
                    {{-- <a href="/articles/{{ $articles->id }}"> --}} 
                    <a href="{{ route('articles.show',$article->id) }}"> 
                    {{ $article->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
    {{-- 自分の記事投稿 --}}
    <hr>
    <h1>自分の記事一覧</h1>
    @if (!empty($my_articles))
        <ul>
            @foreach ($my_articles as $article)
                <li>
                    {{-- <a href="/articles/{{ $articles->id }}"> --}} 
                    <a href="{{ route('articles.show',$article->id) }}"> 
                    {{ $article->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    {{-- 投稿記事ボタン作成 --}}
    <button type="button" onclick="location.href='{{ route('articles.create') }}'">記事投稿</button>
</body>

</html>
