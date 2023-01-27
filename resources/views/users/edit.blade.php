@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <h1 class="text-center mb-3">Edit User</h1>
            <form action="/users/{{ $user->id }}" method="post">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-select">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
            </form>
        </div>
    </div>
@endsection