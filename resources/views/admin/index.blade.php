@extends('layouts.admin')
@section('title') Профиль @endsection
@section('header')
    <h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

           @include('inc.include', ['name' => 'администратор'])
        </div>

    </div>
@endsection
