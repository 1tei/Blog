<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    public function show()
    {
        //
    }


    public function store(Post $post)
    {
        Bookmark::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return back()->with('success', 'Post bookmarked');
    }

    public function destroy(Post $post)
    {
        DB::table('bookmarks')
            ->select('id')
            ->where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->delete();

        return back()->with('success', 'Post removed from bookmarks!');
    }
}