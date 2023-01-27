@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <h1 class="text-center mb-3">Data Pembayaran</h1>

            {{-- alert --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @can('superadmin')
                <a href="/payments/check" class="btn text-white mb-3" style="background-color: cadetblue">Bayar</a>
            @endcan

            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    {{-- <th scope="col">Transaction</th> --}}
                    <th scope="col">Admin</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Penalty Fee</th>
                    <th scope="col">Total</th>
                    <th scope="col">Jatuh Tempo</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            {{-- <td>{{ $payment->transaction_id }}</td> --}}
                            <td>{{ $payment->user->username }}: {{ $payment->user->name }}</td>
                            <td>{{ $payment->customer->code }}: {{ $payment->customer->name }}</td>
                            <td>{{ $payment->penalty_fee }}</td>
                            <td>{{ $payment->total }}</td>
                            <td>{{ $payment->transaction->jatuh_tempo }}</td>
                            <td>{{ $payment->tanggal_bayar }}</td>
                            <td>
                                <a href="/payments/{{ $payment->id }}/print" target="_BLANK" class="btn text-white" style="background-color: cadetblue;">Cetak</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Data not found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection