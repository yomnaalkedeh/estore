<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\Admin\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory(5)->create();
       // Admin::factory()->has(Product::factory()->count(5), 'products')->create();
    }
}
