<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username|min:4',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => ['required', 'max:255', 'min:7'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        //session()->flash('success', 'Your account has been created.');
        return redirect('/')->with('success', 'Your account has been created.');;
    }
}
