<?php

namespace Database\Seeders;

use App\Models\Admin\Product;
use App\Models\Admin\State;
use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
        ->hasAttached(Category::factory()->count(5), [], 'subcategories')
        ->count(5)->create();

        Category::factory()
        ->hasAttached(State::factory()->count(5), [], 'states')
        ->count(5)->create();


         Category::factory()->has(Product::factory()->count(5), 'products')->create();
    }
}
