<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    public function render(): View|Closure|string
    {
        $authenticatedUserId = Auth::id();

        $followedUser = null;
        if (!Auth::guest() && $authenticatedUserId) {
            $followedUser = User::find($authenticatedUserId)->followInstances();
        }

        return view('posts._header', [
            'followedUser' => $followedUser
        ]);
    }
}
