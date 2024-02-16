<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:handle}', [PostController::class, 'show'])->name('posts');

Route::post('posts/{post:handle}/comments', [CommentController::class, 'store']);

Route::post('follow/{user}', [FollowController::class, 'store']);
Route::delete('unfollow/{user}', [FollowController::class, 'destroy']);

Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmarks');
Route::post('favorite/{post}', [BookmarkController::class, 'store']);
Route::delete('unfavorite/{post}', [BookmarkController::class, 'destroy']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('postAll');
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('postCreate');
    Route::get('admin/posts/{post:handle}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});