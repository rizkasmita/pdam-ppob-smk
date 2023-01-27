@extends('dashboard.main')
{{-- @extends('layouts.mainn') --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="mt-3 mb-3 text-center">Edit Category</h1>
            <form action="/categories/{{ $category->id }}" method="post">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tarif1" class="form-label">Rate 0-10m3</label>
                    <input type="text" name="tarif1" id="tarif1" class="form-control @error('tarif1') is-invalid @enderror" value="{{ old('tarif1', $category->tarif1) }}">
                    @error('tarif1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tarif2" class="form-label">Rate 11-20m3</label>
                    <input type="text" name="tarif2" id="tarif2" class="form-control @error('tarif2') is-invalid @enderror" value="{{ old('tarif2', $category->tarif2) }}">
                    @error('tarif2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tarif3" class="form-label">Rate 21-30m3</label>
                    <input type="text" name="tarif3" id="tarif3" class="form-control @error('tarif3') is-invalid @enderror" value="{{ old('tarif3', $category->tarif3) }}">
                    @error('tarif3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tarif4" class="form-label">Rate >30m3</label>
                    <input type="text" name="tarif4" id="tarif4" class="form-control @error('tarif4') is-invalid @enderror" value="{{ old('tarif4', $category->tarif4) }}">
                    @error('tarif4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
                <a href="/categories" class="btn text-white" style="background-color: darkslategray">Cancel</a>
            </form>
        </div>
    </div>
@endsection