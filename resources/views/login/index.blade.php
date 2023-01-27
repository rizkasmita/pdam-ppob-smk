<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <style>
        html, body {
            height: 100%;
        }
        body {
            /* yang buat jadi ke tengah vertically */
            display: flex;
            align-items: center;

            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            /* background-color: #b8e3ff; */
        }
        .form-signin {
            width: 100%;
            max-width: 350px;

            /* yang buat jadi ke tengah horizontally */
            margin: auto;
            
            padding: 15px;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="text"] {
            margin-bottom: -17px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

    <title>Log in</title>
</head>
<body>
    <div class="form-signin">
        <form action="/login" method="post">
            @csrf
            
            <h1 class="mb-3 fw-normal text-center">Please log in</h1>
            
            {{-- alert --}}
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com">
                <label for="username">Username</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <label for="password">Password</label>
            </div>

            <button type="submit" class="w-100 btn btn-lg text-white" style="background-color:cadetblue">Log in</button>

            {{-- <p class="text-center text-muted mt-2"><small>Not registered? Register <a href="/register">here</a>!</small></p> --}}
        </form>
    </div>
</body>
</html>