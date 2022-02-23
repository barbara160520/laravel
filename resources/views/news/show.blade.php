@extends('layouts.main')
@section('title')
 Geek news for you brains	@parent
@endsection
@section('content')
<div class="container">
<div class="row mb-1" style="justify-content: center;">
<div class="col-md-8">

<article id="{{$news->id}}" class="blog-post">
    <h2 class="blog-post-title">{{$news->title}}</h2>
    <p class="blog-post-meta">Автор: {{$news->author}}</p>
    @if($news->image)
    <img src="{{ Storage::disk('public')->url($news->image)}}" class="img-fluid" alt="{{$news->slug}}">
    @endif
    <p class="blog-post-text">{!!$news->description!!}</p>


</article>
<a href="{{ route('category.show',['category'=>$news->category_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">К категории</a>
<a href="{{ route('news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Все новости</a>
</div>
</div>
</div>
@endsection
