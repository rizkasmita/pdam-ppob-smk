@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <h1 class="text-center mb-3">Data Pemakaian Air</h1>

            {{-- alert --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @can('superadmin')
            <a href="/usages/check" class="btn text-white mb-3" style="background-color: cadetblue">Add</a>
            @endcan
            
            <table class="table table-striped align-middle text-center">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Code</th>
                    <th scope="col">Operator Name</th>
                    <th scope="col">Latest Meter</th>
                    <th scope="col">Current Meter</th>
                    <th scope="col">Total Meter</th>
                    <th scope="col">Period</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    @forelse ($usages as $usage)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $usage->customer->name }}</td>
                            <td>{{ $usage->customer->code }}</td>
                            <td>{{ $usage->user->name }}</td>
                            <td>{{ $usage->latest_meter }}</td>
                            <td>{{ $usage->current_meter }}</td>
                            <td>{{ $usage->total_meter }}</td>
                            <td>{{ $usage->period }}</td>
                            @if ($usage->transaction->has_paid)
                                <td></td>
                            @else
                                <td>
                                    <a href="/usages/{{ $usage->id }}/edit" class="btn text-white btn-sm" style="background-color: cadetblue">edit</a>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection