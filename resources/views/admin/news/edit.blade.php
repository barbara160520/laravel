@extends('layouts.admin')
@section('title') Редактирование новостей @endsection
@section('header')
    <h1 class="h2">Редактировать новость</h1>
@endsection
@section('content')
@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <div>
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="title">Подзаголовог</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $news->slug }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $news->description  !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection
