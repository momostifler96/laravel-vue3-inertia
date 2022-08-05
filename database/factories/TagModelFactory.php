<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagModel>
 */
class TagModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "tag_id"=>rand(1,30),
            "model_id"=>rand(1,30),
            "model_type"=>Post::class,
        ];
    }
}
