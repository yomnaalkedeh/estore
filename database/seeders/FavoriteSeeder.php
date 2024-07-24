<?php

namespace Database\Seeders;

use App\Models\Admin\Favorite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Favorite::factory(10)->create();
    }
}
