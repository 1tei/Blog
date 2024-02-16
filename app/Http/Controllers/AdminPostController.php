<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')->with('categories', $categories);
    }

    public function store()
    {
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        if (request()->status) {
            if ($post->category) {
                $post->update([
                    'status' => request()->status
                ]);
                back()->with('success', 'Post updated!');
            } else {
                back()->with('fail', 'Post is missing information');
            }
        }

        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'handle' => ['required', Rule::unique('posts', 'handle')->ignore($post), 'max:16', 'min:3'],
            'title' => ['required', 'max:255', 'min:3'],
            'excerpt' => ['required'],
            'body' => ['required']
        ]);
    }

}
