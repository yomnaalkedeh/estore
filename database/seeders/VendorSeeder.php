<?php

namespace Database\Seeders;

use App\Models\Admin\User;
use App\Models\Admin\Vendor;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Vendor::factory()->count(5)->create();
       // Vendor::factory()->has(Product::factory()->count(5), 'products')->create();
    }
}
