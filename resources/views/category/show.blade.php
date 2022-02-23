@extends('layouts.main')
@section('title')
 Geek news for you brains	@parent
@endsection
@section('content')
<div class="container">
<div class="row mb-1" style="justify-content: center;">
<div class="col-md-10">
<article class="blog-post">
    <h2 class="blog-post-title">{{$category->title}}</h2>
    <p class="blog-post-meta">Количество  новостей: {{$category->news->count()}}</p>
    <h3>О данном разделе:</h3>
    <p class="blog-post-text">{{$category->description}}</p>

<a href="{{ route('category.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Все Категории</a>
</article>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@forelse($news as $newsItem)

		<div class="col">
			<div class="card shadow-sm">
                @if($newsItem->image)
					<img width="100%" height="225" src="{{ Storage::disk('public')->url($newsItem->image) }}" >
				@else
				<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
					<title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
					<text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                 @endif
				<div class="card-body">
					<div class="card-header">
						<strong>{{ $newsItem->title }}</strong>
					</div>
					<p class="card-text">{!! $newsItem->description !!}</p>
					<div>Автор: {{ $newsItem->author }}</div>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
                        <a href="{{ route('news.show', ['news' => $newsItem]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            <small class="text-muted">{{ $newsItem->created_at }}</small>
                        </div>
					</div>
				</div>
			</div>
		</div>
@empty
	<h1>В этой категории новостей нет </h1>
@endforelse
</div>
</div>
</div>
</div>
@endsection
