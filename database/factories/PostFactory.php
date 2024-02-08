<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(25),
            'handle' => fake()->unique()->word,
            'excerpt' => fake()->paragraph,
            'body' => fake()->realText(1500),
            'category_id' => Category::factory(),
            'user_id' => User::factory()
        ];
    }
}
