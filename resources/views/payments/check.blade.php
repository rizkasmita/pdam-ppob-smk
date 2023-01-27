@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <form action="/payments/bayar" method="post">
                @method('get')
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label">ID Pelanggan</label>
                    <input type="text" name="customer_id" id="customer_id" class="form-control">
                </div>
                <button type="submit" class="btn text-white" style="background-color: cadetblue">Submit</button>
            </form>
        </div>
    </div>
@endsection