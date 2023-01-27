@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <h1 class="mb-3 text-center">Edit Pemakaian</h1>
            <form action="/usages/{{ $usage->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label class="form-label">ID Pelanggan</label>
                    <input class="form-control" value="{{ $usage->customer->code }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" value="{{ $usage->customer->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input class="form-control" value="{{ $usage->customer->address }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Latest Meter</label>
                    <input class="form-control" value="{{ $usage->latest_meter }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Meter</label>
                    <input name="current_meter" type="text" class="form-control @error('current_meter') is-invalid @enderror" value="{{ $usage->current_meter }}">
                    @error('current_meter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="latest_meter" value="{{ $usage->latest_meter }}">
                <input type="hidden" name="customer_id" value="{{ $usage->customer_id }}">
                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
                @can('superadmin')
                    <a href="/usages" class="btn text-white" style="background-color: darkslategrey;">Back</a>
                @endcan
                @can('petugas')
                    <a href="/usages/{{ $usage->customer_id }}" class="btn text-white" style="background-color: darkslategrey">Back</a>
                @endcan
            </form>
        </div>
    </div>
@endsection