@extends('layouts.admin')
@section('title') Добавить категорию @endsection
@section('header')
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
@include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.category.store') }}">
        @csrf
            <div class="form-group">
                <label for="title">Наименование категории</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание категории</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.category.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection
