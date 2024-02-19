<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard.index', [
            'users' => User::orderBy('created_at', 'desc')->take(5)->get(),
            'posts' => Post::orderBy('created_at', 'desc')->take(5)->get(),
            'most_viewed' => Post::orderBy('view_count', 'desc')->take(5)->get()
        ]);
    }
}
