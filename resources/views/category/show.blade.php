@extends('layouts.main')
@section('title')
 Geek news for you brains	@parent
@endsection
@section('content')
<div class="container">
<div class="row mb-1" style="justify-content: center;">
<div class="col-md-8">
<article class="blog-post">
    <h2 class="blog-post-title"><?=$categoryItem['title']?></h2>
    <p class="blog-post-meta">Количество  новостей: <?=$categoryItem['new_id']?></p>
    <h3>О данном разделе:</h3>
    <p class="blog-post-text"><?=$categoryItem['description']?></p>
    <a href="{{ route('news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Все  новости  раздела</a>
</article>
<a href="{{ route('category.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Назад</a>
</div>
</div>
</div>
@endsection
