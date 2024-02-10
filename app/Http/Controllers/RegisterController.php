<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $user = User::create(request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users,username', 'min:3', 'max:255'],
            'email' => ['required', 'unique:users,email', 'email', 'max:255'],
            'password' => ['required', 'min:6', 'max:255']
        ]));

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
