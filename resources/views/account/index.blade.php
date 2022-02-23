@extends('layouts.admin')
@section('title') GeekBrainsNews @endsection
@section('header')
    <h1 class="h2">Добро пожаловать</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
    <h2>@include('inc.include', ['name' => Auth::user()->name ])</h2>
    <p>
    <form method="POST" action="{{ route('users.update',['user' => Auth::user()]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="name">Ваше Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="text"xtarea class="form-control" name="email" id="email" value="{!! Auth::user()->email !!}">
                @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit" value="Изменить" class="btn btn-outline-secondary"">Изменить данные профиля</button>
        </form>
    </p>
    </div>
    <div class="col-lg-6" style="text-align: right;">
    @if(Auth::user()->avatar)
        <img class="bd-placeholder-img rounded-circle" src="{{ Auth::user()->avatar }}" style="width:200px;hight:200px;">
    @else
        <svg class="bd-placeholder-img rounded-circle" width="200" height="200" role="img" aria-label="Фото пользователя" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Фото</title>
                <rect width="100%" height="100%" fill="#777"/>
                <text x="50%" y="50%" fill="#777" dy=".3em">пользователя</text>
            </svg>
    @endif
    </div>
</div>

@endsection

