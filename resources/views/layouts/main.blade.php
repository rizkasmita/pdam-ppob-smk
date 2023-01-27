<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>{{ $title }}</title>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a href="" class="navbar-brand">PDAM</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">beranda</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#" class="nav-link {{ request()->is('/') ? 'active' : '' }}">simulasi</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="/menu" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">menu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            menu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li>
                                <a href="/customers" class="dropdown-item">data pelanggan</a>
                            </li>
                            <li>
                                <a href="/users" class="dropdown-item">data admin</a>
                            </li>
                            <li>
                                <a href="/categories" class="dropdown-item">data kategori</a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/login" class="btn btn-outline-light">sign in</a>
                    </li> --}}
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            {{-- <a href="/logout" class="btn btn-outline-light">sign out</a> --}}
                            <button type="submit" class="btn btn-outline-light">sign out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>