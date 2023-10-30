<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = Str::ucfirst(fake()->unique()->words(rand(1, 3), true));
        $slug = Str::slug($title);
        
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->sentence(),
            'parent_id' => Category::count() ? Category::pluck('id')->random() : 0,
        ];
    }
}
