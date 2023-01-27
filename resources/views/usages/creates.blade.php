@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <form action="{{ route('usages.store', $customer->id) }}" method="post">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <input type="hidden" name="latest_meter" value="{{ $customer->meter_air }}">

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
                
                <div class="mb-3">
                    <label for="akhir">Current Meter</label>
                    <input type="text" name="current_meter" id="akhir" class="form-control">
                </div>

                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
                <a href="/usages" class="btn text-white" style="background-color: darkslategrey">Back</a>
            </form>
        </div>
    </div>
@endsection