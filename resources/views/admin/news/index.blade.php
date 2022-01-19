@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Список новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}"
               type="button" class="btn btn-sm btn-outline-secondary">Добавить новость
            </a>
        </div>

    </div>
@endsection
@section('content')
  <!--  <div class="table-responsive">-->
        <div class="row mb-2">
        @forelse($data as $newsItem)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">{{$newsItem['author']}}</strong>
                <h3 class="mb-0">{{$newsItem['title']}}</h3>
                <div class="mb-1 text-muted">{{now('Europe/Moscow')}}</div>
                    <p class="card-text mb-auto">{{$newsItem['description']}}</p>
                    <a href="#" class="stretched-link">Удалить</a>
                </div>
            </div>
        </div>
        @empty
	        <h1>Новостей нет</h1>
        @endforelse
        </div>

@endsection
