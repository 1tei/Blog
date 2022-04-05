<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id
        ]);

//        User::truncate();
//        Post::truncate();
//        Category::truncate();
//        $user = User::factory()->create();
//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//
//        Post::create([
//            'category_id' => $personal->id,
//            'user_id' => $user->id,
//            'title' => 'My Personal Post',
//            'slug' => 'my-personal-post',
//            'excerpt' => '<p>the post about my personal stuff</p>',
//            'body' => '<p>body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post.</p>'
//        ]);
//
//        Post::create([
//            'category_id' => $family->id,
//            'user_id' => $user->id,
//            'title' => 'My Family Post',
//            'slug' => 'my-family-post',
//            'excerpt' => '<p>the post about my family</p>',
//            'body' => '<p>body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post.</p>'
//        ]);
//
//        Post::create([
//            'category_id' => $work->id,
//            'user_id' => $user->id,
//            'title' => 'My Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => '<p>the post about my work</p>',
//            'body' => '<p>body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post. body of post.</p>'
//        ]);
    }
}
