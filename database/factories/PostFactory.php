<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        $randomUserId = User::inRandomOrder()->first()->id;
     
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->realText(200, 2),
            'user_id' => $randomUserId,
        ];
    }
}
