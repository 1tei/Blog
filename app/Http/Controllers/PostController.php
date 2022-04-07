<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author'])
            )->paginate(9)->withQueryString(),
            //$this->getPosts(),
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /*  protected function getPosts() {

          $posts = Post::latest()->with(['category', 'author']);

          if (request('search')) {
              $posts
                  ->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
          }

          return $posts->get();
    }*/
}
