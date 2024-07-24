<?php

namespace Database\Seeders;

use App\Models\Admin\Order;
use App\Models\Admin\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory(5)->create();
      //   Client::factory()->has(Order::factory()->count(5), 'orders')->create();
    }
}
