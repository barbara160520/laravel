@extends('layouts.admin')
@section('title') Добавить ресурс @endsection
@section('header')
    <h1 class="h2">Добавить ресурс</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>

    </div>
@endsection
@section('content')
@include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.source.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="url">Адрес</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                @error('url') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
        <a href="{{ route('admin.source.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection
