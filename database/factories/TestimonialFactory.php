<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ['name' => fake()->name(),
            'Position' => fake()->randomNumber(),
            'content' => fake()->Text(),
            'published'=> fake()->boolean(),
            'image_name'=>fake()->name(),
            'image_data'=>fake()->imageUrl(360, 360,  'persons', true, 'jpg'),
            //
        ];
    }
}
