<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О сайте</h4>
                    <p class="text-muted"> На этом сайте вы найдете много свежих, полезных и интересных новостей.</p>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('about.index') }}">
                        Подробнее
                    </a>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    @if(Auth::user()->is_admin)
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.index') }}">
                        Администрирование
                    </a>
                    @else
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('users.feedback.create')}}" class="text-white">Обратная связь</a></li>
                        <li><a href="{{route('users.order.create')}}" class="text-white">ЗАКАЗ</a></li>
                    </ul>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('account') }}">
                        Профиль
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('about.index') }}" class="navbar-brand d-flex align-items-center">
                <strong>Geek News for you Brains</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
