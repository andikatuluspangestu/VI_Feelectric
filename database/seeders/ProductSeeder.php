<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Espresso Single',
            'description' => '100% one shot extract arabica coffee',
            'price' => 35000,
            'stock' => 50,
            'category_id' => 1, // Ensure this matches the ID in the categories table
            'image' => 'image/espresso-single.png',
        ]);

        Product::create([
            'name' => 'Manual Brew Coffee',
            'description' => 'Freshly brewed coffee using manual methods',
            'price' => 45000,
            'stock' => 30,
            'category_id' => 2, // Ensure this matches the ID in the categories table
            'image' => 'image/manual-brew.png',
        ]);

        // Add more products as needed
    }
}
