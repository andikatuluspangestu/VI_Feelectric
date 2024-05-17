<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(base_path('database/data/districts.csv'), 'r');
        fgetcsv($file); // Melewatkan header jika ada

        while (($data = fgetcsv($file)) !== FALSE) {
            District::create([
                'id' => $data[0],
                'kode' => $data[1],
                'name' => $data[2]
            ]);
        }

        fclose($file);
    }
}

