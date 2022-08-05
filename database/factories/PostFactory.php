<?php

namespace Database\Factories;

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
    public function definition()
    {
        $title = fake()->unique()->word();
        return [
            "title"=> $title,
            "slug"=> str($title)->slug(),
            "type"=> fake()->randomElement(['article','video']),
            "description"=>fake()->paragraph(20),
            "user_id"=>1,
            "category_id"=>rand(1,20),
        ];
    }
}
