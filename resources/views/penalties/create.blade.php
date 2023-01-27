@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <h1 class="text-center mb-3">Add Penalty</h1>

            {{-- alert --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/penalties" method="post">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label" for="category">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="fee">Fee</label>
                    <input type="number" class="form-control @error('fee') is-invalid @enderror" id="fee" name="fee" value="{{ old('fee') }}">
                    @error('fee')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn text-white" style="background-color: cadetblue;">Submit</button>
                <a href="/penalties" class="btn text-white" style="background-color: darkslategrey;">Cancel</a>

            </form>
        </div>
    </div>
@endsection