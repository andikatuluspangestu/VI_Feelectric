<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regencies; // Tambahkan semicolon di sini
use Illuminate\Support\Facades\File;

class RegenciesSeeder extends Seeder // Perbaiki penamaan class ini agar konsisten
{
    public function run()
    {
        $file = fopen(base_path('database/data/regencies.csv'), 'r');
        fgetcsv($file); // Melewatkan header jika ada

        while (($data = fgetcsv($file)) !== FALSE) {
            Regencies::create([ // Perbaiki pemanggilan method create
                'id' => $data[0],
                'kode' => $data[1],
                'name' => $data[2]
            ]);
        }

        fclose($file);
    }
}
