<header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Новости Дня!</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link @if(request()->routeIs('about.*')) active @endif" href="{{route('about.index')}}" aria-current="page">Главная</a>
        <a class="nav-link @if(request()->routeIs('users.feedback.*')) active @endif" href="{{route('users.feedback.create')}}">Обратная связь</a>
        <a class="nav-link @if(request()->routeIs('users.order.*')) active @endif" href="{{route('users.order.create')}}">Заказ</a>
      </nav>
    </div>
  </header>
