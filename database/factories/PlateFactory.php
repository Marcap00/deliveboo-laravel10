<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "restaurant_id" => Restaurant::inRandomOrder()->first(),
            "name" => fake()->word(),
            "description" => fake()->realText(),
            "ingredient_description" => implode(",", fake()->words()),
            "price" => fake()->randomFloat(2, 1, 200),
            "visible" => fake()->boolean(),
            "image" => "https://placehold.co/600x400?text=Plate"
        ];
    }
}
