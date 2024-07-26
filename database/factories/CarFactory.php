<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ['title' => fake()->name(),
        'Luggage' => fake()->randomDigitNotNull(),
        'doors'=>fake()->randomDigitNotNull(),
        'passengers'=>fake()->randomDigitNotNull(),
        'price'=>fake()->randomNumber(),
        'content' => fake()->Text(),
        'active'=> fake()->boolean(),
        'image_name'=>fake()->name(),
        'image_data'=>fake()->imageUrl(360, 360,  'cars', true, 'jpg'),
            //
        ];
    }
}
