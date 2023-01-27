@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center" style="margin-top: 10px">
        <div class="col-lg-12">
        <?php 
            $t=time();
            // echo($t . "<br>");
            $test = date("H:i:s", strtotime('+8 hours',$t));
            if($test >= "06:00:00" && $test <= "11:59:59") {
                $time = "good morning";
            } elseif ($test >= "12:00:00" && $test <= "16:59:59") {
                $time = "good afternoon";
            } elseif ($test >= "17:00:00" && $test <= "20:59:59" ) {
                $time = "good evening";
            } else {
                $time = "good night";
            }
        ?>
            <h1>{{ $time }}, {{ auth()->user()->name }}</h1>
            <hr>
            @can('superadmin')
            <div class="row justify-content-center">
                <div class="border border-4 border-dark col-lg-5 rounded-pill mx-3" style="height: 200px; display: flex; align-items: center;">
                    <div style="margin: auto" class="text-center">
                        <h3>Pelanggan</h3>
                        <h6 class="text-muted">{{ $countCustomer }} pelanggan aktif</h6>
                    </div>
                </div>
                   <div class="border border-4 col-lg-5 border-dark rounded-pill mx-3" style="display: flex; height: 200px; align-items: center;">
                    <div class="text-center" style="margin:auto">
                        <h3>Tagihan</h3>
                        <h6 class="text-muted">{{ $countTagihan }} tagihan belum dibayar</h6>
                    </div>
                </div>
                {{-- <div class="border border-4 col-lg-5 border-dark rounded-pill mx-3 mt-3" style="display: flex; height: 200px; align-items: center">
                    <div class="text-center" style="margin: auto">
                        <h3>Pemakaian</h3>
                        <h6 class="text-muted">{{ $countUsage }} pelanggan yang pemakaiannya belum diinput</h6>
                    </div>
                </div> --}}
            </div>
            @endcan
        </div>
    </div>
@endsection