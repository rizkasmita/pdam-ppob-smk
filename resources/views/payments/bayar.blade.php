@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <table>
                <h4>Total Tunggakan: {{ $tunggakan }}</h4>
                @forelse ($data as $d)
                    <tr>
                        <td>Periode</td>
                        <td>{{ $d->usage->period }}</td>
                    </tr>
                    <tr>
                        <td width="200px">Admin</td>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Customer ID</td>
                        <td>{{ $d->customer->code }}</td>
                    </tr>
                    <tr>
                        <td>Customer Name</td>
                        <td>{{ $d->customer->name }}</td>
                    </tr>
                    <tr>
                        <td>Customer Address</td>
                        <td>{{ $d->customer->address }}</td>
                    </tr>
                    {{-- <tr>
                        <td>bayar</td>
                        @if($d->has_paid === 0)
                            <td>belum</td>
                        @else
                            <td>udah</td>
                        @endif
                    </tr> --}}
                    <tr>
                        <td>Jatuh Tempo</td>
                        <td>{{ $d->jatuh_tempo }}</td>
                    </tr>
                    <tr>
                        <td>Bill Amount</td>
                        <td>{{ $d->bill_amount }}</td>
                    </tr>
                    <?php
                        if(date('Y-m-d') > $d->jatuh_tempo) {
                            $penalty = $penalty_fee;
                        } else {
                            $penalty = 0;
                        }
                    ?>
                    <tr>
                        <td>Penalty Fee</td>
                        <td>{{ $penalty }}</td>
                    </tr>

                    <?php $total = $d->bill_amount + $penalty ?>

                    <tr>
                        <td>Total</td>
                        <td>{{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Action</td>
                        <td>
                            <form action="/payments" method="post">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ $d->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="customer_id" value="{{ $d->customer_id }}">
                                <input type="hidden" name="penalty_fee" value="{{ $penalty }}">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <button type="submit" class="btn text-white btn-sm" style="background-color: cadetblue">Bayar</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                @empty
                    <tr>
                        <td>data tidak ada</td>
                    </tr>
                @endforelse
            </table>
            {{-- <h4>Total Tunggakan: {{ $tunggakan }}</h4> --}}
            {{-- @forelse ($data as $d)
                <form action="/" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID Pelanggan</label>
                        <input type="text" class="form-control" value="{{ $d->customer->code }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" value="{{ $d->customer->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Pelanggan</label>
                        <input type="text" class="form-control" value="{{ $d->customer->address }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bill Amount</label>
                        <input type="text" class="form-control" value="Rp{{ $d->bill_amount }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penalty Fee</label>
                        <input type="text" class="form-control" value="Rp{{ $penalty_fee }}" disabled>
                    </div>

                    

                    <div class="mb-3">
                        <label class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" value="Rp{{ $total }}" disabled>
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: cadetblue">Bayar</button>
                    <p>================================================</p>
                </form>
            @empty
                
            @endforelse --}}
        </div>
    </div>
@endsection