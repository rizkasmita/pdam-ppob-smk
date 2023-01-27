@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">

            {{-- @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif --}}

            {{-- @can('petugas') --}}
            {{-- <form action="/usages/{{ $customer->id }}" method="post"> --}}
            {{-- @endcan --}}
            {{-- @can('superadmin') --}}
            <form action="/usages" method="post">
            {{-- @endcan --}}
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <input type="hidden" name="latest_meter" value="{{ $customer->meter_air }}">
                {{-- <input type="hidden" name="total_meter" value="{{ $customer-> }}"> --}}

                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                    <input type="text" class="form-control" name="customer_id" id="id_pelanggan" value="{{ $customer->code }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $customer->address }}" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="awal">Latest Meter</label>
                    <input type="text" name="latest_meter" id="awal" class="form-control" value="{{ $customer->meter_air }}" disabled>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="akhir">Current Meter</label>
                    <input type="text" name="current_meter" id="akhir" class="form-control @error('current_meter') is-invalid @enderror">
                    @error('current_meter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                
                <div class="mb-3">
                    <label for="akhir">Current Meter</label>
                    <input type="text" name="current_meter" id="akhir" class="form-control" autofocus>
                </div>

                {{-- <div class="mb-3">
                    <label for="period">Date</label>
                    <input type="date" name="period" id="period" class="form-control" required>
                </div> --}}

                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
                <a href="/usages/check" class="btn text-white" style="background-color: darkslategrey">Back</a>
            </form>
        </div>
    </div>
    {{-- <script type="text/javascript">
        alert($message);
    </script> --}}
@endsection