<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('news.index')) active @endif" href="{{ route('news.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="users"></span>
                    Профиль
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file-text"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif" href="{{ route('admin.category.index') }}">
                    <span data-feather="layers"></span>
                    Категории
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
        </ul>

    </div>
</nav>
