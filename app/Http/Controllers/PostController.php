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
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->simplePaginate(9)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    public function store()
    {
        $attributes = request()->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'thumbnail' => ['required', 'image'],
            'handle' => ['required', 'unique:posts,handle', 'max:16', 'min:3'],
            'title' => ['required', 'max:255', 'min:3'],
            'excerpt' => ['required'],
            'body' => ['required']
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->handle);
    }
}
