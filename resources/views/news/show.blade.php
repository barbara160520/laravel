@extends('layouts.main')
@section('title')
 Geek news for you brains	@parent
@endsection
@section('content')
<div class="container">
<div class="row mb-1" style="justify-content: center;">
<div class="col-md-8">
<article class="blog-post">
    <h2 class="blog-post-title"><?=$newsItem['title']?></h2>
    <p class="blog-post-meta">Автор: <?=$newsItem['author']?></p>
    <p class="blog-post-text"><?=$newsItem['description']?></p>
</article>
<a href="{{ route('news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Назад</a>
</div>
</div>
</div>
@endsection
