<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('user.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update()
    {
        if (request()->avatar) {
            $attributes = request()->validate([
                'avatar' => 'required',
            ]);

            if ($attributes['avatar'] ?? false) {
                $attributes['avatar'] = request()->file('avatar')->store('avatars');
            }
        } else {
            $attributes = request()->validate([
                'name' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'username' => ['required', Rule::unique('users', 'username')->ignore(auth()->user()), 'min:3', 'max:255'],
                'email' => ['required', Rule::unique('users', 'email')->ignore(auth()->user()), 'email', 'max:255'],
                'password' => ['required', 'min:6', 'max:255']
            ]);
        }

        auth()->user()->update($attributes);
        return redirect('profile')->with('success', 'Profile updated!');
    }
}
