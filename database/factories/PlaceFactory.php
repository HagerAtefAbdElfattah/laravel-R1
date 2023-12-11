<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'     => fake()->city(),
           'content'    => fake()->text(),
           'priceFrom'  => fake()->numberBetween($min = 200, $max = 6000),
           'priceTo'    => fake()->numberBetween($min = 6000, $max = 12000),
           'published'  => fake()->numberBetween(0,1),
           'image'      => fake()->imageUrl(800,600),
           'created_at' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];
    }
}
