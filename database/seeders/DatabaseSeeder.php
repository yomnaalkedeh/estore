<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use App\Models\User;
use App\Enums\PagesEnum;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\RateSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\ClientSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\VendorSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\FavoriteSeeder;
use Database\Seeders\LocationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           CategorySeeder::class,
            StateSeeder::class,
        //    ProductSeeder::class,
           ClientSeeder::class,
           UserSeeder::class,
           OrderSeeder::class,
           PaymentSeeder::class,
           AdminSeeder::class,

           VendorSeeder::class,
           FavoriteSeeder::class,
           LocationSeeder::class,
           PageSeeder::class,
           OptionSeeder::class,
           OptionValueSeeder::class,

           ReviewSeeder::class,
        ]);

        Page::factory()->create([

            'type' => PagesEnum::CONTACT
             ]);

             User::factory(5)->create([

                'role' => 2
                 ]);

// \App\Models\Us
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
