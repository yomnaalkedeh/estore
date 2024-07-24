<?php

namespace Database\Seeders;

use App\Models\OptionValue;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // OptionValue::factory(10)->create();
     /*  OptionValue::factory(5)
       ->hasAttached(Product::factory()->count(5), [], 'products')
       ->create();*/
    }
}
