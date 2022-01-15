@extends('layouts.about')
@section('title')Geek news for you brains @parent
@endsection
@section('content')
  <main class="px-3">
    <h1>Добро пожаловать</h1>
    <p class="lead">На нашем сайте Вы можете найти для себя Новость Дня!
    Глобальные, самые свежии и правдивые новости станут для Вас чем то новым!
    Читайте нас, мы с радостью работаем для Вас над каждой вестью!</p>
    <p class="lead">
      <a href="{{route('news.index')}}" class="btn btn-lg btn-outline-secondary ">К НОВОСТЯМ</a>
    </p>
  </main>
@endsection
@section('footer')
<footer class="mt-auto text-white-50"></footer>
@endsection
<!--btn btn-lg btn-secondary fw-bold border-white bg-white-->
