@extends('layouts.admin')
@section('title') Список категорий @endsection
@section('header')
    <h1 class="h2">Редактировать категорию</h1>
@endsection
@section('content')
@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <div>
        <form method="post" action="{{ route('admin.category.update',['category' => $data]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="title">Наименование категории</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание категории</label>
                <textarea class="form-control" name="description" id="description">{!! $data->description !!}</textarea>
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.category.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection
