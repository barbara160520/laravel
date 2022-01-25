@extends('layouts.admin')
@section('title') Добавить запись @endsection
@section('header')
    <h1 class="h2">Добавить запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    @if ($message == "success")
            <x-alert type="success" message="Успех! Новость добавлена" ></x-alert>
    @endif
    <div>
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="title">Подзаголовог</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="1" @if(old('category_id') === '1') selected @endif>Спорт</option>
                    <option value="2" @if(old('category_id') === '2') selected @endif>Искусство</option>
                    <option value="3" @if(old('category_id') === '3') selected @endif>Политика</option>
                    <option value="4" @if(old('category_id') === '4') selected @endif>ЧП/ЧС</option>
                    <option value="5" @if(old('category_id') === '5') selected @endif>Природа</option>
                    <option value="6" @if(old('category_id') === '6') selected @endif>Шоу-Бизнес</option>
                    <option value="13" @if(old('category_id') === '13') selected @endif>IT-сфера</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
        <a href="{{ route('admin.news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection
