<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin\Order;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        order::factory()
        ->count(5)
        ->for(User::factory())
        ->create();
      //  Order::factory(5)->create();
    }
}
