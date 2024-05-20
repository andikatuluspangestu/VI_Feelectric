<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Ordinary Coffee']);
        Category::create(['name' => 'Manual Brew']);
        Category::create(['name' => 'Latte Non Coffee']);
        Category::create(['name' => 'Feel The Signature']);
    }
}
