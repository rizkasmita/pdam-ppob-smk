<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index', [
            'title' => 'Customer List',
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create', [
            'title' => 'Add Customer',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required|unique:customers|numeric|digits:7',
            'address' => 'required',
            'category_id' => 'required'
        ]);

        Customer::create($validatedData);
        
        return redirect('/customers')->with('success', 'Customer has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'title' => 'Edit Customer',
            'categories' => Category::all(),
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'category_id' => 'required'
        ]);

        Customer::where('id', $customer->id)->update($validatedData);

        return redirect('/customers')->with('success', 'Customer has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect('/customers')->with('success', 'Customer has been deleted successfully');
    }

    public function remove($id)
    {
        // dd($id);
        $status = Customer::where('id', $id)->value('status');
        // dd($status);
        if($status) {
            Customer::where('id', $id)->update(['status' => 0]);
        } else {
            Customer::where('id', $id)->update(['status' => 1]);
        }

        return redirect('/customers')->with('success', 'Status has changed successfully');
    }
}
