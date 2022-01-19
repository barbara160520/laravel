@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Отзывы</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
@endsection
@section('content')
        <div class="row mb-2">
        @forelse($data as $feedbackItem)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <p class="d-inline-block mb-2 text-primary">
                    {{$feedbackItem['lastName']}}
                    {{$feedbackItem['firstName']}}
                </p>
                <h3 class="mb-0">{{$feedbackItem['message']}}</h3>
                    <div class="mb-1 text-muted">{{now('Europe/Moscow')}}</div>
                </div>
            </div>
        </div>
        @empty
	        <h1>Отзывов нет</h1>
        @endforelse
        </div>

@endsection
