<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required']
        ]);

        $category = Category::create($attributes);

        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => ['required']
        ]);

        $category->update($attributes);

        return back()->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $posts = Post::where('category_id', $category->id)->get();

        foreach ($posts as $post) {
            if (!$post->status = 'deleted') {
                $post->status = 'draft';
                $post->save();
            }
        }

        return back()->with('success', 'Category deleted!');
    }

}
