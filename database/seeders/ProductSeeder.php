<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Oppo Mobile',
                'price' => '3000',
                'category' => 'mobile',
                'description' => 'A smartphone witg Oppo 4G ram and more feature',
                'gallery' => 'https://www.lg.com/jp/images/mobile-phone/LGV35/gallery/medium_01_sv.jpg'
            ],
            [
                'name' => 'LG Fridge',
                'price' => '20000',
                'category' => 'fridge',
                'description' => 'A fride with more feature',
                'gallery' => 'https://www.lg.com/au/images/fridges/md07504149/gallery/d2.jpg'
            ],
            [
                'name' => 'Sony TV',
                'price' => '40000',
                'category' => 'tv',
                'description' => 'A sony with more feature',
                'gallery' => 'https://jp.sharp/aquos/products/bw1/images/gallery-1.jpg'
            ],
            [
                'name' => 'Panasonic TV',
                'price' => '30000',
                'category' => 'tv',
                'description' => 'A panasonic tv with more feature',
                'gallery' => 'https://jp.sharp/aquos/products/cx1/images/gallery-1.jpg'
            ]
        ]);
    }
}
