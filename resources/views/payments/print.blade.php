<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'Courier New', Courier, monospace, 'Times New Roman'
        }
    </style>
    <title>Struk Pembayaran PDAM</title>
</head>
<body>
    <h1>UD. StaryStealer</h1>
    <h3>Loket Pembayaran PDAM</h3>
    <hr>
    <div style="text-align: center">
        <h2>STRUK PEMBAYARAN PDAM</h2>
        <br><br>
    </div>
    <table style="margin: auto">
        <tr>
            <td>Tanggal Bayar</td>
            <td>:</td>
            <td>{{ $payment->tanggal_bayar }}</td>
        </tr>
        <tr>
            <td>Jatuh Tempo</td>
            <td>:</td>
            <td>{{ $payment->transaction->jatuh_tempo }}</td>
        </tr>
        <tr>
            <td>Customer ID</td>
            <td>:</td>
            <td>{{ $payment->customer->code }}</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>:</td>
            <td>{{ $customer->category->name }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ $payment->customer->name }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td>{{ $customer->address }}</td>
        </tr>
        <tr>
            <td>Bill Period</td>
            <td>:</td>
            <td>{{ $usage->period }}</td>
        </tr>
        <tr>
            <td>Last Meter Read</td>
            <td>:</td>
            <td>{{ $usage->latest_meter }} m<sup>3</sup></td>
        </tr>
        <tr>
            <td>Current Meter Read</td>
            <td>:</td>
            <td>{{ $usage->current_meter }} m<sup>3</sup></td>
        </tr>
        <tr>
            <td>Meter Usage</td>
            <td>:</td>
            <td>{{ $usage->total_meter }} m<sup>3</sup></td>
        </tr>
        <tr>
            <td>Penalty Fee</td>
            <td>:</td>
            <td>Rp{{ $payment->penalty_fee }}</td>
        </tr>
        <tr>
            <td>Bill Amount</td>
            <td>:</td>
            <td>Rp{{ $transaction->bill_amount }}</td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
        <tr>
            <td><b>Total Payment</b></td>
            <td>:</td>
            <td>Rp{{ $payment->total }}</td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">=== Thank you ===</td>
        </tr>
    </table>
    
    
    <script>
        window.print();
    </script>
</body>
</html>