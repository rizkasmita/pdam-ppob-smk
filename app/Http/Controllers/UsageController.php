<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Usage;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(session('customer_id'));
        // if ( session()->has('customer_id') )
        // {
        //     return view('usages.index', [
        //         'title' => 'index',
        //         'usages' => Usage::where('customer_id', session('customer_id'))->get()
        //     ]);
        // } else
        // {
            return view('usages.index', [
                'title' => 'index',
                'usages' => Usage::all()
            ]);
        // }
    }

    // public function indexPetugas(Request $request)
    // {
    //     dd($request);
    //     return view('usages.index', [
    //         'title' => 'index',
    //         'usages' => Usage::where('customer_id', $request->customer_id)->get()
    //     ]);
    // }
    
    public function check()
    {
        return view('usages.check', [
            'title' => 'check'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Customer $customer)
    {
        // dd($request);
        // dd(Customer::where('code', $request->code)->first());
        // $check = Customer::find($request->code);
        $check = Customer::where('code', $request->code)->first();
        // dd($check->status);
        if($check === null)
        {
            return redirect('/usages/check')->with('error', 'ID Pelanggan tidak tersedia');
        } else {
            if($check->status)
            {
                return view('usages.create', [
                    'title' => 'Add Transaction',
                    'customer' => Customer::where('code', $request->code)->first()
                ]);
            } else {
                return redirect('/usages/check')->with('error', 'Customer deactivated');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Usage $usage)
    {
        // dd($request);
        // dd(date('Y-m-'.'20', strtotime('+1 month')));
        // dd(date('F'. +1 . ' Y'));
        // dd($request->customer_id);
        // dd($request->current_meter - $request->last_meter);
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'user_id' => 'required',
            // 'period' => 'required',
            'latest_meter' => 'required',
            'current_meter' => 'required'
        ]);

        // dd($validatedData);

        $currentMeter = intval($validatedData['current_meter']);
        $lastMeter = intval($validatedData['latest_meter']);
        // $meterAir = intval($user)

        $jatuhtempo = Transaction::where('customer_id', $request->customer_id)->latest()->value('jatuh_tempo');
        $latest_period = Usage::where('customer_id', $request->customer_id)->latest()->value('period');
        if($currentMeter <= $lastMeter)
        {
            return redirect('/usages/check')->with('failed', 'Current meter harus lebih besar dari latest meter');
        // } elseif($latest_period === date('F Y'))
        // } elseif(date('Y-m-d') < date('Y-m-'.'20'))
        } elseif(date('Y-m-d') < $jatuhtempo)
        {
            return redirect('/usages/check')->with('error', 'Cannot add data right now. Try next month.');
        } elseif ($latest_period === date('F Y', strtotime('+1 month')))
        {
            return redirect('/usages/check')->with('error', 'Data untuk periode ini sudah terisi');
        }
         elseif ( date('Y-m-d') > date('Y-m-'.'20') )
        {
            $validatedData['period'] = date('F Y', strtotime('+1 month'));
        }
        else {
            $validatedData['period'] = date('F Y');
        }

        // dd($validatedData['customer_id']);
        // dd(Customer::where('id', $validatedData['customer_id'])->get());
        $getCategory = Customer::where('id', $validatedData['customer_id'])->value('category_id');
        // dd(Category::where('id', $getCategory)->value('tarif1'));
        $tarif1 = Category::where('id', $getCategory)->value('tarif1');
        $tarif2 = Category::where('id', $getCategory)->value('tarif2');
        $tarif3 = Category::where('id', $getCategory)->value('tarif3');
        $tarif4 = Category::where('id', $getCategory)->value('tarif4');

        // $validatedData['total_meter'] = $validatedData['current_meter'] - $validatedData['last_meter'];

        if($currentMeter <= $lastMeter)
        {
            // return redirect('/usages/create')->withErrors('current_meter', 'Current meter must be greater than latest meter');
            // $validatedData['current_meter'] = 
            // return false;
            // return alert('Current meter must be greater than latest meter');
            // return echo ""
            // $message = "Current meter must be greater than latest meter";
            // return back()->with($message);
            // return redirect()->back()->with("<script>alert('Current meter must be greater than latest meter')</script>");
            return redirect('/usages/check')->with('failed', 'Current meter harus lebih besar dari latest meter');
        }
        // elseif ($currentMeter === $lastMeter) {
        //     return redirect('/usages/check')->with('failed', 'Current meter must be greater than latest meter');
        // }
        else {
            $validatedData['current_meter'] = $currentMeter;
            $validatedData['latest_meter'] = $lastMeter;
            $validatedData['total_meter'] = $currentMeter - $lastMeter;
    
            // $meterAir = $validatedData['current_meter'] + $validatedData['last_meter'];
    
            $meterAir = $lastMeter + $validatedData['total_meter'];
    
            // dd($validatedData);
            Customer::where('id', $request->customer_id)->update(['meter_air' => $meterAir]);
            // dd(Usage::create($validatedData)->id);
            // dd($usage->id);
            $enter = Usage::create($validatedData);
            $enter;
            // dd($enter->total_meter);

            $transaction = new Transaction();
            // $transaction->user_id = $validatedData['user_id'];
            // $transaction->customer_id = $validatedData['customer_id'];
            $transaction->usage_id = $enter->id;
            $transaction->user_id = $enter->user_id;
            $transaction->customer_id = $enter->customer_id;
            // $transaction->jatuh_tempo = date('Y-m-d', mktime(0,0,0,date('n'), date('j')+20, date('Y')));
            // $transaction->jatuh_tempo = date('Y-m-'.'20');
            if( date('Y-m-d') > date('Y-m-'.'20') )
            {
                $transaction->jatuh_tempo = date('Y-m-'.'20', strtotime('+1 month'));
            } else {
                $transaction->jatuh_tempo = date('Y-m-'.'20');
            }

            // $transaction->bill_amount = 0;
            if($enter->total_meter <= 10)
            {
                // $amount = $enter->total_meter * $tarif1;
                // $transaction->bill_amount = $amount;
                $transaction->bill_amount = $enter->total_meter * $tarif1;
            } elseif($enter->total_meter > 10 && $enter->total_meter <= 20)
            {
                $amount = $enter->total_meter * $tarif2;
                $transaction->bill_amount = $amount;
            } elseif($enter->total_meter > 20 && $enter->total_meter <= 30)
            {
                $amount = $enter->total_meter * $tarif3;
                $transaction->bill_amount = $amount;
            } else
            {
                $amount = $enter->total_meter * $tarif4;
                $transaction->bill_amount = $amount;
            }

            $transaction->save();

            if( auth()->user()->level === 'superadmin' )
            {
                return redirect('/usages')->with('success', 'ok');
            } elseif ( auth()->user()->level === 'petugas' )
            {
                // return redirect('/usages'.'?customer_id='. $validatedData['customer_id']);
                return redirect('/usages' . '/' . $enter->customer_id);

                // return redirect()->route('usages.show', $validatedData['customer_id']);

                // return redirect('/usages/check')->with('success', 'data has added successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        // dd(Usage::where('customer_id', $id)->get());
        return view('usages.index', [
            'title' => 'index',
            'usages' => Usage::where('customer_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usage $usage)
    {
        // dd($usage);
        return view('usages.edit', [
            'title' => 'edit',
            'usage' => $usage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'current_meter' => 'required'
        ]);

        $validatedData['total_meter'] = $validatedData['current_meter'] - $request->latest_meter;

        $meterAir = $request->latest_meter + $validatedData['current_meter'];
        Customer::where('id', $request->customer_id)->update(['meter_air' => $meterAir]);

        Usage::where('id', $id)->update($validatedData);

        $customerCategory = Customer::where('id', $request->customer_id)->value('category_id');
        $tarif1 = Category::where('id', $customerCategory)->value('tarif1');
        $tarif2 = Category::where('id', $customerCategory)->value('tarif2');
        $tarif3 = Category::where('id', $customerCategory)->value('tarif3');
        $tarif4 = Category::where('id', $customerCategory)->value('tarif4');

        if ( $validatedData['total_meter'] <= 10 )
        {
            $bill = $validatedData['total_meter'] * $tarif1;
        } elseif ( $validatedData['total_meter'] > 10 && $validatedData['total_meter'] <= 20 )
        {
            $bill = $validatedData['total_meter'] * $tarif2;
        } elseif ( $validatedData['total_meter'] > 20 && $validatedData['total_meter'] <= 30 )
        {
            $bill = $validatedData['total_meter'] * $tarif3;
        } else
        {
            $bill = $validatedData['total_meter'] * $tarif4;
        }
        Transaction::where('usage_id', $id)->update(['bill_amount' => $bill]);

        if(auth()->user()->level === 'superadmin')
        {
            return redirect('/usages')->with('success', 'Data has edited successfully');
        } elseif ( auth()->user()->level === 'petugas' )
        {
            return redirect('/usages' . '/' . $request->customer_id)->with('success', 'Data has been edited successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function check()
    // {
    //     return view('usages.check', [
    //         'title' => 'chec'
    //     ]);
    // }
}
