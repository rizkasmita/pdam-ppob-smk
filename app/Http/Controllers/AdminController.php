<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Admin',
            'admins' => User::where('level', 'admin')->get()
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'title' => 'Add Admin',
            'ori' => User::where('level', 'ori')->get()
        ]); 
    }

    public function addRemove(Request $request)
    {
        if($request->level == 'ori')
        {
            User::where('id', $request->id)->update(['level' => 'admin']);
            return redirect('/admins')->with('success', 'Admin added');
        }
        elseif($request->level == 'admin')
        {
            User::where('id', $request->id)->update(['level' => 'ori']);
            return redirect('/admins')->with('success', 'Admin removed');
        }
    }
}