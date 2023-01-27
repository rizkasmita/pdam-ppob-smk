@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-8">
            <h1 class="text-center mt-3 mb-3">Users</h1>

            {{-- alert --}}
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="/users/create" class="btn text-white" style="background-color: cadetblue">Add</a>
            <a href="/admins" class="btn text-white ms-auto" style="background-color: cadetblue">Admin Loket</a>
            <a href="/petugas" class="btn text-white" style="background-color: cadetblue">Petugas</a>

            <table class="table table-striped text-center align-middle">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td>
                            <form action="/users/{{ $user->id }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="btn-group">
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-outline-dark">edit</a>
                                    <button type="submit" class="btn btn-dark" onclick="return confirm('are you sure to delete this user?')">delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection