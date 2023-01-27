@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-10">
            <h1 class="text-center mb-3">Admin</h1>

            {{-- alert --}}
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="/users" class="btn text-white" style="background-color: cadetblue">Back</a>

            {{-- <a href="/admins/create" class="btn btn-info text-white mb-3">Add</a> --}}
            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    {{-- <th scope="col">Action</th> --}}
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->level }}</td>
                            {{-- <td>
                                <form action="/admins/{{ $admin->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $admin->id }}">
                                    <input type="hidden" name="level" value="{{ $admin->level }}">
                                    <button type="submit" class="btn btn-dark" onclick="return confirm('are you sure to remove this admin?')">remove</button>
                                </form>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            {{-- <th colspan="6" scope="row" class="bg-danger text-white">Data not found</th> --}}
                            <td colspan="6" class="text-center">Data not found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection