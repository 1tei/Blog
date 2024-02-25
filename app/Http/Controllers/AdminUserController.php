<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all()
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update()
    {
        $user = User::find(request()->id);

        $attributes = request()->validate([
            'id' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user), 'min:3', 'max:255'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user), 'email', 'max:255'],
        ]);

        $user->update($attributes);
        return redirect('admin/users')->with('success', 'User profile updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        DB::table('bookmarks')
            ->select('id')
            ->where('user_id', $user->id)
            ->delete();

        DB::table('follows')
            ->select('id')
            ->where('user_id', $user->id)
            ->delete();

        DB::table('follows')
            ->select('id')
            ->where('followed_user_id', $user->id)
            ->delete();

        DB::table('posts')
            ->select('id')
            ->where('user_id', $user->id)
            ->update([
                'status' => 'deleted',
                'user_id' => null]);

        return back()->with('success', 'User deleted!');
    }
}
