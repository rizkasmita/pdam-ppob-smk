@extends('layouts.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-10">
            <h1 class="text-center">Add Petugas</h1>
            <a href="/petugas" class="btn btn-info text-white mb-3">Back</a>
            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @forelse($ori as $o)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->username }}</td>
                            <td>{{ $o->email }}</td>
                            <td>{{ $o->level }}</td>
                            <td>
                                <form action="/petugas/{{ $o->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $o->id }}">
                                    <input type="hidden" name="level" value="{{ $o->level }}">
                                    <button type="submit" class="btn btn-dark">add</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" class="bg-danger text-white" colspan="6"></th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection