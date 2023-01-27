@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-10">
            <h1 class="text-center mb-3">Denda</h1>

            {{-- alert --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <a href="/penalties/create" class="btn text-white mb-3" style="background-color: cadetblue;">Add</a>
            <table class="table table-striped text-center align-middle">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @foreach ($penalties as $penalty)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $penalty->category->name }}</td>
                            <td>{{ $penalty->fee }}</td>
                            <td>
                                <form action="/penalties/{{ $penalty->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="btn-group btn-sm">
                                        <a href="/penalties/{{ $penalty->id }}/edit" class="btn btn-outline-dark btn-sm">edit</a>
                                        <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('are you sure to delete this penalty?')">delete</button>
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