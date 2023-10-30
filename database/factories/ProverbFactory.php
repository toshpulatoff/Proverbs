<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proverb>
 */
class ProverbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'slug' => fake()->words(3, true), //problem was with seeding in proverb seeder
            'author_id' => $user->id,
            'status' => fake()->randomElement(['1', '0']),
        ];
    }
}
