<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('users.index')->with('users', $users);
    }

    public function show(user $user)
    {
        $user->role = 'admin';
        $user->update();
        return redirect(route('user.index'))->with(session()->flash('success', 'admin add sucsesfly'));
    }
    public function edit(user $user)
    {
        $user->role = 'writer';
        $user->update();
        return redirect(route('user.index'))->with(session()->flash('success', 'amin remove  sucsesfly'));
    }
}
