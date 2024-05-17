<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Espresso Single',
                'image' => 'asset/image/espresso-single.png',
                'short_description' => '100% one shot extract arabica coffee',
                'detailed_description' => 'Detailed description for Espresso Single...',
                'price' => 35000,
                'stock' => 86,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan produk dummy lainnya di sini
        ]);
    }
}
