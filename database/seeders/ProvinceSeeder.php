<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(base_path('database/data/provinces.csv'), 'r');
        fgetcsv($file); // Melewatkan header jika ada

        while (($data = fgetcsv($file)) !== FALSE) {
            Province::create([
                'id' => $data[0],
                'name' => $data[1]
            ]);
        }

        fclose($file);
    }
}

