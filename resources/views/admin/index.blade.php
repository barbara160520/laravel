@extends('layouts.admin')
@section('title') Профиль @endsection
@section('header')
    <h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

           @include('inc.include', ['name' => Auth::user()->name ])
        </div>

    </div>
@endsection
@section('content')
<!--<div class="table-responsive">-->
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('account')}}">ПРОФИЛЬ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.category.index')}}">КАТЕГОРИИ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.news.index')}}">НОВОСТИ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.source.index')}}">РЕСУРСЫ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('users.order.index')}}">ЗАКАЗЫ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('users.feedback.index')}}">ОТЗЫВЫ</a></h3>
                </div>
            </div>
        </div>
    </div>

@endsection
