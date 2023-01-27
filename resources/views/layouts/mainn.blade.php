<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coba</title>
    <style>
        html, body {
            /* background-color: #f5f5f5; */
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/offcanvas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="sidebar shadow" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/home" class="{{ request()->is('home*') ? 'active' : '' }}">home</a>
        <a href="/users" class="{{ request()->is('users*') ? 'active' : '' }}">user</a>
        <a href="/customers" class="{{ Request::is('customers*') ? 'active' : '' }}">customer</a>
        <a href="/categories" class="{{ request()->is('categories*') ? 'active' : '' }}">category</a>
    </div>
    <div class="navbar navbar-dark shadow sticky" style="background-color: #92a9bd;">
        {{-- <span onclick="openNav()">open</span> --}}
        <a onclick="openNav()" class="" id="btn"><i class="bi bi-list text-white"></i></a>
        <div class="ms-auto">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="badge bg-light rounded-pill border p-2 px-3" style="color: #92a9bd; letter-spacing: 2px">logout</button>
            </form>
        </div>
    </div>
    
    <div id="main">
        @yield('content')
    </div>
    
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("btn").style.marginLeft = "250px";
        }
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("btn").style.marginLeft = "0";
        }
    </script>
</body>
</html>