<?php

namespace Database\Factories\Admin;

use App\Models\User;
use App\Models\Admin\Client;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Favorite>
 */
class FavoriteFactory extends Factory
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
            'favoritable_id' => Product::inRandomOrder()->first()?->id,
            'favoritable_type' => Product::class,
        ];
    }
}
