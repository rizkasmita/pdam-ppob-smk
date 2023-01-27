@extends('layouts.main')
@section('content')
    {{-- <div class="card text-black border-warning mt-3" style="max-width: 18rem">
        <div class="card-header fw-bold">Cek Tagihan</div>
        <div class="card-body">
            <h5 class="card-title">bayar</h5>
            <p class="card-text">text</p>
            <a href="/bayar" class="btn btn-warning">check</a>
        </div>
    </div> --}}
    <h1 class="text-center my-4 text-info">Menu</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-info d-flex align-items-center" style="max-width: 25rem; height: 200px;">
                <div class="card-body text-center flex-fill p-5">
                    <h5 class="card-title">Data Pelanggan</h5>
                    <h6 class="card-subtitle text-muted mb-3">Check</h6>
                    <p class="card-text">
                        <a href="#" class="btn btn-info text-white">Check</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-info d-flex align-items-center" style="max-width: 25rem; height: 200px;">
                <div class="card-body text-center flex-fill p-5">
                    <h5 class="card-title">Tarif Air Minum</h5>
                    <h6 class="card-subtitle text-muted mb-3">per golongan</h6>
                    <a href="" class="btn btn-info text-white">Click here</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-info d-flex align-items-center" style="max-width: 25rem; height: 200px;">
                <div class="card-body text-center flex-fill p-5">
                    <h5 class="card-title">Denda Keterlambatan</h5>
                    <h6 class="card-subtitle text-muted mb-3">per hari</h6>
                    {{-- <p class="card-text">text</p> --}}
                    <a href="" class="btn btn-info text-white">Click here</a>
                </div>
            </div>
        </div>
    </div>
@endsection