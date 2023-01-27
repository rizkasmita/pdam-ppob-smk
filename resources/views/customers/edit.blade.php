@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <h1 class="text-center mb-3">Edit Customer</h1>
            <form action="/customers/{{ $customer->id }}" method="post">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="code" class="form-label">Customer Code</label>
                    <input type="text" name="code" id="code" class="form-control" disabled value="{{ $customer->code }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $customer->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $customer->address) }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-select">
                        {{-- <option selected value="{{ $customer->category->id }}">{{ $customer->category->name }}</option> --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($customer->category->id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
                <a href="/customers" class="btn text-white" style="background-color: darkslategray">Cancel</a>
            </form>
        </div>
    </div>
@endsection