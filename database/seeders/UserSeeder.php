<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\User;
use App\Models\Admin\Admin;
use App\Models\Admin\Order;
use App\Models\Admin\Client;
use App\Models\Admin\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->has(Order::factory()->count(5), 'orders')->count(3)->create();
       // User::factory()->has(Vendor::factory()->count(5), 'orders')->create();

      /* User::factory(3)
       ->hasAttached(Rate::factory()->count(5), [], 'rates')
       ->create();*/
    }
}
