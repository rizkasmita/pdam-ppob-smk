<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Penalty;
use App\Models\Payment;
use App\Models\Usage;
use App\Models\User;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.index', [
            'title' => 'Data Pembayaran',
            'payments' => Payment::all()
        ]);
    }

    public function check()
    {
        return view('payments.check', [
            'title' => 'check'
        ]);
    }

    public function bayar(Request $request)
    {
        $customer_id = Customer::where('code', $request->customer_id)->value('id');
        // $bla = Transaction::where('customer_id', $customer_id)->get();
        // dd($bla->id);
        // dd(Transaction::where('id', $bla->id)->value('jatuh_tempo'));
        // foreach($bla as $b) {
        //     // dd($b->id);
        //     echo $b->jatuh_tempo . "<br>";
        // }
        // $jatuh_tempo = Transaction::where('id', $bla)->get('jatuh_tempo');
        // $test = Transaction::where('customer_id', $customer_id)->get();
        // dd($jatuh_tempo);

        // foreach($test as $t) {
        //     dd($t->jatuh_tempo);
        // }

        // mengambil id customer dari code

        // dd(Transaction::where('customer_id', $customer_id)->where('has_paid', false)->get());

        // hitung penalty fee
        // if(date('Y-m-d') > $jatuh_tempo )
        // {
        //     // get category customer
            $category = Customer::where('id', $customer_id)->value('category_id');
        //     // get data penalty dari category id
            $penalty_fee = Penalty::where('id', $category)->value('fee');
        // } else {
        //     $penalty_fee = 0;
        // }

        // $bill_amount = Transaction::where('customer_id', $customer_id)->value('bill_amount');
        // $bill_amount = Transaction::where('customer_id', $customer_id)->where('has_paid', false)->get(value('bill_amount'));
        // $total = $bill_amount + $penalty_fee;
        // foreach($bill_amount as $bill)
        // {
        //     $total = $bill + $penalty_fee;
        // }

        // dd(Transaction::where('customer_id', $customer_id)->where('has_paid', false)->first());
        // dd($coba);

        // dd($penalty_fee);

        return view('payments.bayar', [
            'title' => 'bayar',
            'data' => Transaction::where('customer_id', $customer_id)->where('has_paid', false)->get(),
            'tunggakan' => Transaction::where('customer_id', $customer_id)->where('has_paid', false)->count(),
            // 'category_id' => Customer::where('id', $customer_id)->value('category_id')
            'penalty_fee' => $penalty_fee
            // 'penalty_fee' => $penalty_fee
            // 'total' => $total
        ]);
    }
    
    public function store(Request $request)
    {
        Payment::create([
            'transaction_id' => $request->transaction_id,
            'user_id' => $request->user_id,
            'customer_id' => $request->customer_id,
            'penalty_fee' => $request->penalty_fee,
            'total' => $request->total,
            'tanggal_bayar' => date('Y-m-d H:i:s')
        ]);
        Transaction::where('id', $request->transaction_id)->update(['has_paid' => true]);

        if ( auth()->user()->level === 'superadmin' )
        {
            return redirect('/payments')->with('success', 'Payment successful!');
        }
        elseif ( auth()->user()->level === 'admin' )
        {
            return redirect('/payments' . '/' . $request->customer_id)->with('success', 'Payment successful!');
        }
    }

    public function show($id)
    {
        // dd($id);
        return view('payments.index', [
            'title' => 'index',
            'payments' => Payment::where('customer_id', $id)->get()
        ]);
    }

    public function print($id)
    {
        $payment = Payment::where('id', $id)->first();
        // dd($payment);
        $transaction = Transaction::where('id', $payment->transaction_id)->first();
        $usage = Usage::where('id', $transaction->usage_id)->first();
        $customer = Customer::where('id', $payment->customer_id)->first();
        return view('payments.print', [
            'payment' => $payment,
            'transaction' => $transaction,
            'usage' => $usage,
            'customer' => $customer
        ]);
    }
}
