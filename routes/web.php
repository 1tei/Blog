<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//use Spatie\YamlFrontMatter\YamlFrontMatter;
//use Illuminate\Support\Facades\File;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

//Route::get('posts/{post}', function ($id) { // { x } makes a wildcard
    // Find a post by its slug and pass it to a view called "post"
    // return view('post', ['post' => Post::findOrFail($id)]);

/*  $post = Post::find($slug);
    return view('post', ['post' => $post]);*/

//}); //->where('post', '[A-z_\-]+')

/*Route::get('categories/{category:slug}', function(Category $category) { //route model binding - wildcard name must match variable
    return view('posts.index', [
        'posts'=>$category->posts, //->load(['category', 'author'])
    ]);
})->name('category');*/

/*Route::get('/authors/{author:username}', function(User $author) { //route model binding - wildcard name must match variable
    return view('posts.index', [
        'posts'=>$author->posts
    ]);
});*/
