<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id,
            'product_id' => Product::inRandomOrder()->first()?->id,
            'rating' => random_int(1, 5),
            'review_text' => $this->faker->sentences(3, true),

        ];
    }
}
