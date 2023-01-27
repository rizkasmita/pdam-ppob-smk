@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-10">
            <h1 class="text-center mb-3">Petugas</h1>

            {{-- alert --}}
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="/users" class="btn text-white" style="background-color: cadetblue;">Back</a>
            
            {{-- <a href="/petugas/create" class="btn btn-info mb-3 text-white">Add</a> --}}
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
                    @forelse($petugas as $p)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->level }}</td>
                            {{-- <td>
                                <form action="/petugas/{{ $p->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $p->id }}">
                                    <input type="hidden" name="level" value="{{ $p->level }}">
                                    <button type="submit" class="btn btn-dark" onclick="return confirm('are you sure to remove this admin?')">remove</button>
                                </form>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            {{-- <th scope="row" colspan="6" class="bg-danger text-white">Data not found</th> --}}
                            <td colspan="6" class="text-center">Data not found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection