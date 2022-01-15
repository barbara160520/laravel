<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
<link rel="manifest" href="img/site.webmanifest">
<title>@section('title') - GeekBrains @show</title>
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<meta name="theme-color" content="#7952b3">
<style>
    .cover-container{
        height: 723.200px;
        display: flex;
        flex-direction: column;
        padding: 1rem;
        margin-left: auto;
        margin-right: auto;
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
<body class="d-flex h-100 text-center text-white bg-dark">
<div class="cover-container">
    <x-aboutheader></x-aboutheader>
    @yield('content')
    @yield('footer')
</div>
</body>
</html>
