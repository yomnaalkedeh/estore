<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Vendor;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->numberBetween(10, 1000),
            'desc' => $this->faker->sentence(),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'image' => $this->faker->randomElement(['/product-1.jpg','/product-2.jpg','/product-3.jpg','/product-4.jpg','/product-5.jpg']),
          //  'admin_id' =>  $this->faker->randomNumber(),
           // 'vendor_id' =>  $this->faker->randomNumber(),

        ];
    }
}
