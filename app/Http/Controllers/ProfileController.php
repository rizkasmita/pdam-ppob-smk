<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'My Profile'
        ]);
    }

    public function update(Request $request, User $user)
    {
        // dd($user->name);
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password == "")
        {
            $validatedData['password'] = bcrypt('12345');
        } else {
            $validatedData['password'] = bcrypt($request->password);
        }

        if($request->username != $user->username && $request->email != $user->email)
        {
            $validatedData['username'] = 'required|unique:users';
            $validatedData['email'] = 'required|unique:users';
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect('/profile')->with('success', 'Profile has updated successfully!');
    }
}
