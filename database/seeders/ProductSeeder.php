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
            'price' => 100000,
            'image' => 'saber_lily.jpg'
        ]);

        Product::create([
            'name' => 'Action Silver Wolf',
            'description' => 'Action figure Silver Wolf dari game "Honkai: Star Rail"',
            'price' => 250000,
            'image' => 'saber_lily.jpg'
        ]);

                Product::create([
            'name' => 'Action Figure Kurumi Tokisaki',
            'description' => 'Action figure Kurumi Tokisaki dari anime "Date A Live" dengan detail gaun hitam elegan',
            'price' => 300000,
            'image' => 'saber_lily.jpg'
        ]);

        Product::create([
            'name' => 'Nendoroid Hatsune Miku',
            'description' => 'Nendoroid Hatsune Miku dengan aksesoris mic dan stand transparan',
            'price' => 200000,
            'image' => 'saber_lily.jpg'
        ]);

        Product::create([
            'name' => 'Action Figure Ubel',
            'description' => 'Action figure Ubel dari anime "Sousou no Frieren" dengan pose siap bertarung',
            'price' => 275000,
            'image' => 'saber_lily.jpg'
        ]);

        Product::create([
            'name' => 'Figure Rem Kimono Version',
            'description' => 'Figure Rem dari anime "Re:Zero" versi kimono cantik dengan detail bunga',
            'price' => 350000,
            'image' => 'saber_lily.jpg'
        ]);

        Product::create([
            'name' => 'Figure Saber Lily',
            'description' => 'Figure Saber Lily dari seri "Fate" dengan pedang Excalibur dan gaun putih',
            'price' => 400000,
            'image' => 'saber_lily.jpg'
        ]);
    }
}

