@extends('dashboard.main')
{{-- @extends('layouts.mainn') --}}
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
            <h1 class="mt-3 text-center mb-3">Data Kategori</h1>

            {{-- alert --}}
            @if (session()->has('success'))
                {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> --}}
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('categories.create') }}" class="btn text-light mb-3" style="background-color: cadetblue">Add</a>
            <table class="table table-striped text-center align-middle">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">0-10 m<sup>3</sup></th>
                    <th scope="col">11-20 m<sup>3</sup></th>
                    <th scope="col">21-30 m<sup>3</sup></th>
                    <th scope="col">>30 m<sup>3</sup></th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            {{-- <th scope="row">{{ $category->id }}</th> --}}
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->tarif1 }}</td>
                            <td>{{ $category->tarif2 }}</td>
                            <td>{{ $category->tarif3 }}</td>
                            <td>{{ $category->tarif4 }}</td>
                            <td>
                                {{-- <a href="" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="badge bg-danger text-decoration-none"><i class="bi bi-trash"></i></a> --}}
                                <form action="/categories/{{ $category->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="btn-group" role="group">
                                        <a href="/categories/{{ $category->id }}/edit" class="btn btn-outline-dark">edit</a>
                                        <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure to delete this category?')">delete</button>
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