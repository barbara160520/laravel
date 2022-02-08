<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        @if(Auth::user()->is_admin)
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.index')) active @endif" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>
        @endif
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('account')) active @endif" aria-current="page" href="{{ route('account') }}">
                    <span data-feather="user"></span>
                    Профиль
                </a>
            </li>
            <li class="nav-item">
            @if(Auth::user()->is_admin)
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
            @else
                <a class="nav-link @if(request()->routeIs('news.*')) active @endif" href="{{ route('news.index') }}">
            @endif
                <span data-feather="file-text"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
            @if(Auth::user()->is_admin)
                <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif" href="{{ route('admin.category.index') }}">
            @else
                <a class="nav-link @if(request()->routeIs('category.*')) active @endif" href="{{ route('category.index') }}">
            @endif
                <span data-feather="list"></span>
                    Категории
                </a>
            </li>
            @if(Auth::user()->is_admin)
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.source.*')) active @endif" href="{{ route('admin.source.index') }}">
                    <span data-feather="layers"></span>
                    Ресурсы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.order.*')) active @endif" href="{{ route('users.order.index') }}">
                    <span data-feather="file"></span>
                    Заказы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('users.feedback.*')) active @endif" href="{{ route('users.feedback.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Отзывы
                </a>
            </li>
            @endif
        </ul>

    </div>
</nav>
