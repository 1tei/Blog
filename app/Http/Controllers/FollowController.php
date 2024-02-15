<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function show()
    {
        //
    }

    public function store(User $user)
    {
        $userName = DB::table('users')
            ->select('name')
            ->where('id', $user->id)
            ->value('name');

        Follow::create([
            'user_id' => auth()->id(),
            'followed_user_id' => $user->id
        ]);

        return back()->with('success', 'Now following ' . $userName);
    }

    public function destroy(User $user)
    {
        DB::table('follows')
            ->select('id')
            ->where('user_id', auth()->id())
            ->where('followed_user_id', $user->id)
            ->delete();

        return back()->with('success', 'User unfollowed!');
    }
}
