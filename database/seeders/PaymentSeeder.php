<?php

namespace Database\Seeders;

use App\Models\Admin\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Payment::factory(5)->create();
    }
}
