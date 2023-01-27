<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penalty;
use App\Models\Category;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penalties.index', [
            'title' => 'Penalty Fee',
            'penalties' => Penalty::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penalties.create', [
            'title' => 'Add Penalty',
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
            'category_id' => 'required|unique:penalties',
            'fee' => 'required|numeric'
        ]);

        Penalty::create($validatedData);
        return redirect('/penalties')->with('success', 'Penalty fee has added successfully');
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
    public function edit(Penalty $penalty)
    {
        // dd($penalty);
        return view('penalties.edit', [
            'title' => 'Edit Penalty',
            'penalty' => $penalty,
            'categories' => Category::all()
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
        // dd($id);
        $validatedData = $request->validate([
            // 'name' => 'required',
            'fee' => 'required'
        ]);

        Penalty::where('id', $id)->update(['fee' => $validatedData['fee']]);

        return redirect('/penalties')->with('success', 'Penalty fee has updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Penalty::destroy($id);
        return redirect('/penalties')->with('success', 'Penalty has deleted successfully!');
    }
}
