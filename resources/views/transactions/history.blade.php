@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <h1 class="text-center mb-3">Transaction Histories</h1>
            <a href="/transactions" class="btn text-white mb-3" style="background-color: cadetblue">Back</a>
            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    {{-- <th scope="col">Usage ID</th> --}}
                    <th scope="col">Customer</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Jatuh Tempo</th>
                    <th scope="col">Bill Amount</th>
                    {{-- <th scope="col">Penalty Fee</th> --}}
                    {{-- <th scope="col">Total</th> --}}
                </thead>
                <tbody>
                    @forelse ($histories as $history)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            {{-- <td>{{ $history->usage_id }}</td> --}}
                            <td>{{ $history->customer->code }}: {{ $history->customer->name }}</td>
                            <td>{{ $history->user->username }}: {{ $history->user->name }}</td>
                            <td>{{ $history->has_paid }}</td>
                            <td>{{ $history->jatuh_tempo }}</td>
                            <td>{{ $history->bill_amount }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection