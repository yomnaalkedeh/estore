<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\Option;
use App\Models\Admin\Order;
use App\Models\OptionValue;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     /*   Product::factory()
        ->hasAttached(Order::factory()->count(5), [], 'orders')
        ->create();*/

        Product::factory(3)
        ->hasAttached(Option::factory()->count(5), [], 'options')
        ->create();
      /*  Product::factory(3)
        ->hasAttached(Rate::factory()->count(5), [], 'rates')
        ->create();*/

        Product::factory(3)
        ->hasAttached(OptionValue::factory()->count(5), [], 'option_values')
        ->create();

        foreach (Product::all() as $product) {
            $url = 'https://picsum.photos/200/300';
            $product->addMediaFromUrl($url)->toMediaCollection("cover");
        }
    }
}
