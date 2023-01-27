<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>Registration</title>

    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            background-color: #f5f5f5;
            /* padding-top: 40px;
            padding-bottom: 40px; */
        }
        .form-signup {
            width: 100%;
            max-width: 350px;
            margin: auto;
            padding: 15px;
        }
        .form-signup .form-floating:focus-within {
            z-index: 2;
        }
        .form-signup input[type="text"] {
            margin-bottom: -1px;
        }
        .form-signup input[type="email"] {
            margin-bottom: -1px;
        }
        .form-signup input[type="password"] {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-signup">
        <form action="/register" method="post">
            @csrf
            <h1 class="fw-normal mb-3 text-center">Register</h1>

            <div class="form-floating">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" style="border-bottom-right-radius: 0; border-bottom-left-radius: 0;" required>
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" style="border-radius: 0" required>
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" style="border-radius: 0" required>
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" style="border-top-left-radius: 0; border-top-right-radius: 0" required>
                <label for="password">Password</label>
                {{-- @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
            </div>

            <button type="submit" class="btn btn-info text-white btn-lg w-100">Submit</button>
            <p class="mt-2 text-center"><small class="text-muted">Have an account? Login <a href="/login">here!</a></small></p>
        </form>
    </div>
</body>
</html>