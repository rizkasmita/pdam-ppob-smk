<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <title>{{ $title }}</title>

    <style>
        html, body {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    @include('dashboard.header')
    
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.sidebar')

            <main class="col-lg-10 col-md-9 ms-sm-auto px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
</body>
</html>