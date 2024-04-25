<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestauranteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'type' => fake()->randomElement(['fast food', 'casual dining', 'fine dining', 'cafe', 'buffet', 'food truck']),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
