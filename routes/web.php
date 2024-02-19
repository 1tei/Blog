<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:handle}', [PostController::class, 'show'])->name('posts');

Route::post('posts/{post:handle}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('follow/{user}', [FollowController::class, 'store'])->middleware('auth');
Route::delete('unfollow/{user}', [FollowController::class, 'destroy'])->middleware('auth');

Route::get('bookmarks', [BookmarkController::class, 'index'])->middleware('auth')->name('bookmarks');
Route::post('favorite/{post}', [BookmarkController::class, 'store'])->middleware('auth');
Route::delete('unfavorite/{post}', [BookmarkController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    Route::get('admin/dashboard', AdminController::class)->name('dashboard');;

    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('postAll');
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('postCreate');
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

    Route::get('admin/categories', [CategoryController::class, 'index']);
    Route::post('admin/categories', [CategoryController::class, 'store']);
    Route::get('admin/categories/create', [CategoryController::class, 'create']);
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy']);

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('users');;
    Route::post('admin/users', [AdminUserController::class, 'store']);
    Route::get('admin/users/create', [AdminUserController::class, 'create']);
    Route::get('admin/users/{user}/edit', [AdminUserController::class, 'edit']);
    Route::patch('admin/users/{user}', [AdminUserController::class, 'update']);
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy']);
});