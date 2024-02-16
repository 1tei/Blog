<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'This email address does not have an account and or password is incorrect.'
            ]);
        };

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Successfully logged out!');
    }
}
