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

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->role = 'admin';
        $user->save();
        return redirect(route('user.index'))->with(session()->flash('success', 'admin add sucsesfly'));
    }
    public function removeAdmin($id)
    {   
        $user = User::find($id);
        $user->role='writer';
        $user->save();
        return redirect(route('user.index'))->with(session()->flash('success', 'admin remove  sucsesfly'));
    }
   
}
