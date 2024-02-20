<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->where('status', 'published')->filter(request(['search', 'category', 'author']))->simplePaginate(10)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        $count = $post->view_count;
        $count++;

        $post->update([
            'view_count' => $count
        ]);

        if ($post->status !== 'published' && auth()->user()->username !== 'teian') {
            abort(404);
        }

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
