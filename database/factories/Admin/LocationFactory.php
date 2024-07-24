<?php

namespace Database\Factories\Admin;

use App\Models\User;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->address(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'user_id' => User::inRandomOrder()->first()?->id,
            'locationable_id' => Product::inRandomOrder()->first()?->id,
            'locationable_type' => Product::class,
        ];
    }
}
