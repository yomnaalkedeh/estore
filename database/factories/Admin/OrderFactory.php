<?php

namespace Database\Factories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          //  'user_id' => User::inRandomOrder()->first()?->id,
            'user_id' => $this->faker->randomNumber(),
        ];
    }
}
