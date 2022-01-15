<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="users"></span>
                    Профиль
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.news.index') }}">
                    <span data-feather="file-text"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                    <span data-feather="layers"></span>
                    Категории
                </a>
            </li>
        </ul>

    </div>
</nav>
