@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <h1 class="text-center mb-3">Edit {{ $penalty->category->name }}'s Penalty</h1>
            <form action="/penalties/{{ $penalty->id }}" method="post">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    {{-- <select class="form-select" name="category_id" id="category">
                        <option value="{{ $penalty->category->id }}"></option>
                    </select> --}}
                    <input type="text" class="form-control" value="{{ $penalty->category->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="fee" class="form-label">Fee</label>
                    <input type="text" class="form-control" id="fee" name="fee" value="{{ $penalty->fee }}">
                </div>

                {{-- <input type="hidden" name="name" value="{{ $penalty->category->name }}"> --}}
                <button type="submit" class="btn text-white" style="background-color: cadetblue;" onclick="return confirm('are you sure to edit this data?')">Submit</button>
                <a class="btn text-white" style="background-color: darkslategrey" href="/penalties">Cancel</a>
            </form>
        </div>
    </div>
@endsection