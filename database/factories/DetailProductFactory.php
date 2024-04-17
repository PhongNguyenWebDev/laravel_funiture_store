<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailProduct>
 */
class DetailProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>rand(1,20),
            'size'=>fake()->randomElement(['S','M','L','XL']),
            'material'=>fake()->word(),
            'color'=>fake()->colorName(),
            'chair_legs'=>fake()->randomElement(['wood','Metal','Plastic']), 
        ];
    }
}
