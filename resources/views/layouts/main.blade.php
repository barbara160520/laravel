<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@section('title') - GeekBrains @show</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<link rel="manifest" href="img/site.webmanifest">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/news.css') }}" rel="stylesheet">
    <style>
        .btn-group {
            align-items: center;
        }
        .btn-group a{
            margin-right: 15px;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

</head>
<body>
<x-header></x-header>
<main>
@yield('header')
@yield('content')
</main>

<x-footer></x-footer>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
