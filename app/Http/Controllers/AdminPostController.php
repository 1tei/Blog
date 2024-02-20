<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

        return redirect('/posts/' . $post->handle);
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
                return back()->with('success', 'Post updated!');
            } else {
                return back()->with('fail', 'Post is missing a category.');
            }
        }

        $userID = User::where('username', request()->author)->value('id');

        if ($userID === null) {
            return back()->with('fail', 'Author does not exist.');
        }

        $attributes = $this->validatePost($post);

        request()->validate([
            'author' => ['required', 'max:50', 'min:3']
        ]);

        unset($attributes['author']);
        $attributes['user_id'] = $userID;

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
