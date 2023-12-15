<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use Faker\Provider\Fakecar;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\>
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
        // trying a different faker by istall a library throughout the "composer.jason"
        // the link of the library =>https://github.com/pelmered/fake-car?tab=readme-ov-file
        // ps it finally worked in my database 😊
        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();

        return [
            'carTitle'    => $vehicle['brand'],
            'price'       => fake()->numberBetween($min = 6000, $max = 12000),
            'description' => fake()->text(),
            'published'   => 1,
            'image'       => fake()->imageUrl(800,600),
            'category_id' => fake()->numberBetween($min = 1, $max = 2),
        ];
       
    }
}
