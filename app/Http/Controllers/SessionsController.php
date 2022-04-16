<?php

namespace App\Http\Controllers;


class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => 'required', //|exists:users, email
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate(); //for protection against session fixation attacks

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified']);

        //throw ValidationException::withMessages([
        // 'email' => 'Your provided credentials could not be verified'
        //]);

    }
}
