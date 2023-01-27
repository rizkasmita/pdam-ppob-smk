@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <h1 class="text-center mb-3">Tagihan</h1>
            <a href="/transactions/histories" class="btn text-white mb-3" style="background-color: cadetblue">History</a>
            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    {{-- <th scope="col">Usage</th> --}}
                    <th scope="col">Customer</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jatuh Tempo</th>
                    {{-- <th scope="col">Tanggal Bayar</th> --}}
                    <th scope="col">Bill Amount</th>
                    {{-- <th scope="col">Penalty Fee</th> --}}
                    {{-- <th scope="col">Total</th> --}}
                </thead>
                <tbody>
                    @forelse ($transactions as $t)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            {{-- <td>{{ $t->usage_id }}</td> --}}
                            <td>{{ $t->customer->code }}: {{ $t->customer->name }}</td>
                            <td>{{ $t->user->username }}: {{ $t->user->name }}</td>
                            <td>{{ $t->has_paid }}</td>
                            <td>{{ $t->jatuh_tempo }}</td>
                            {{-- <td>{{ $t->tanggal_bayar }}</td> --}}
                            <td>{{ $t->bill_amount }}</td>
                            {{-- <td>{{ $t->penalty_fee }}</td> --}}
                            {{-- <td>{{ $t->total }}</td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection