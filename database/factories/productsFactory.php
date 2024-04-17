<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1,4),
            'product_name' => fake()->title(),
            'price' => rand(30,500),
            'discount' => rand(20,50),
            'thumbnail' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
        ];
    }
}
