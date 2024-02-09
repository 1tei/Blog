<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'johndoe'
        ]);

        Post::factory(15)->create([
            'user_id' => $user->id
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => 3
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => 2
        ]);
    }
}
