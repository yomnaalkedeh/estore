<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //  Option::factory(10)->create();
   /*  Option::factory(3)
        ->hasAttached(Product::factory()->count(5), [], 'products')
        ->create();*/
        Option::factory()->has(OptionValue::factory()->count(5), 'optionvalues')->create();
    }
}
