@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('header')
    <h1 class="h2">Редактировать новость</h1>
@endsection
@section('content')
@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    @if ($message == "success")
            <x-alert type="success" message="Успех! Запись изменена" ></x-alert>
    @endif
    <div>
        <form method="get" action="{{ route('admin.news.update', ['news' => $data->id]) }}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
            </div>
            <div class="form-group">
                <label for="title">Подзаголовог</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $data->slug }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $data->author }}">
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
                <textarea class="form-control" name="description" id="description">{!! $data->description  !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.news.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection
