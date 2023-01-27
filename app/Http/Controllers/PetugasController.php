<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.index', [
            'title' => 'List Petugas',
            'petugas' => User::where('level', 'petugas')->get()
        ]);
    }

    public function create()
    {
        return view('petugas.create', [
            'title' => 'Add Petugas',
            'ori' => User::where('level', 'ori')->get()
        ]);
    }

    public function addRemove(Request $request)
    {
        // dd($request->level);
        if($request->level == 'ori')
        {
            User::where('id', $request->id)->update(['level' => 'petugas']);
            return redirect('/petugas')->with('success', 'Petugas added');
        }
        elseif($request->level == 'petugas')
        {
            User::where('id', $request->id)->update(['level' => 'ori']);
            return redirect('/petugas')->with('success', 'Petugas removed');
        }
    }
}
