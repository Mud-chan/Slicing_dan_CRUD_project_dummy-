<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Action Figure Elaina',
            'description' => 'Action figure Elaina dari anime "Majo no Tabitabi" (Wandering Witch)',
            'price' => 100000
        ]);

        Product::create([
            'name' => 'Action Silver Wolf',
            'description' => 'Action figure Silver Wolf dari game "Honkai: Star Rail"',
            'price' => 250000
        ]);
    }
}

