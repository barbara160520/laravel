@extends('layouts.main')
@section('title')
 Geek news for you brains	@parent
@endsection
@section('header')
<section class="py-5 text-center container">
	<div class="row py-lg-5">
		<div class="col-lg-6 col-md-8 mx-auto">
			<h1 class="fw-light">Категории</h1>
            <h3 class="fw-light"><a href="{{ route('news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                Все Новости</a></h3>
		</div>
	</div>
</section>
@endsection
@section('content')
<div class="album py-5 bg-light">
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@forelse($category as $categoryItem)

		<div class="col">
			<div class="card shadow-sm">
				<div class="card-body">
					<div class="card-header">
						<strong>{{ $categoryItem->title }}</strong>
					</div>
					<p class="card-text">{!! $categoryItem->description !!}</p>
					<div>Количество новостей: {{$categoryItem->news->count() }}</div>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
                        <a href="{{ route('category.show', ['category' => $categoryItem]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            <small class="text-muted">{{ $categoryItem->created_at }}</small>
                        </div>
					</div>
				</div>
			</div>
		</div>
@empty
	<h1>Категорий нет</h1>
@endforelse
</div>
</div>
</div>
@endsection
<?php

//dump();
?>
