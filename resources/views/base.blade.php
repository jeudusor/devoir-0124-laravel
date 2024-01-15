<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">

</head>
<body>
<style>
    body {
        font-family: 'PT Sans', sans-serif;
        background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');
        background-attachment: fixed;


    }

    .gradient-custom-4 {
        /* fallback for old browsers */
        background: #84fab0;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary border border-dark rounded-end-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span
                class="text-primary my-5 display-7 fw-bold ls-tight">Sondage App</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}">Tableau de bord</a>
                @guest()
                    <a class="nav-link" href="{{  route('user.login') }}">| Connexion</a>
                @endguest
                @auth()
                    @include('user.tools.user')
                    @include('user.tools.logout')
                @endauth
            </div>
        </div>
    </div>
</nav>

@yield('content')


<script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
