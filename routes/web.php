<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
//use Spatie\YamlFrontMatter\YamlFrontMatter;
//use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts'=>Post::latest()->with(['category', 'author'])->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) { //Post::where('slug', $post->firstorfail();
    return view('post', [
        'post' => $post
    ]);
});

//Route::get('posts/{post}', function ($id) { // { x } makes a wildcard
    // Find a post by its slug and pass it to a view called "post"
    // return view('post', ['post' => Post::findOrFail($id)]);

/*  $post = Post::find($slug);
    return view('post', ['post' => $post]);*/

//}); //->where('post', '[A-z_\-]+')

Route::get('categories/{category:slug}', function(Category $category) { //route model binding - wildcard name must match variable
    return view('posts', [
        'posts'=>$category->posts->load(['category', 'author']),
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);
})->name('category');

Route::get('/authors/{author:username}', function(User $author) { //route model binding - wildcard name must match variable
    return view('posts', [
        'posts'=>$author->posts->load(['category', 'author']),
        'categories' => Category::all()
    ]);
});
