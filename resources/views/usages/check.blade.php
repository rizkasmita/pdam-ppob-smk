@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">

            {{-- alert --}}
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/usages/create" method="post">
                @method('get')
                @csrf
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                    <input type="text" class="form-control" name="code" id="id_pelanggan" required autofocus>
                </div>

                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
            </form>
        </div>
    </div>
@endsection