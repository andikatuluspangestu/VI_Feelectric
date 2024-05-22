<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    public function run()
    {
        Voucher::create([
            'code' => 'ONGKIR50',
            'description' => 'Gratis Ongkir Min. Blj Rp 50RB',
            'discount' => 5000,
            'min_purchase' => 50000,
            'expiry_date' => '2024-07-10'
        ]);

        Voucher::create([
            'code' => 'DISKON15',
            'description' => 'Diskon 15% untuk pembelian min. Rp 100RB',
            'discount' => 15000,
            'min_purchase' => 100000,
            'expiry_date' => '2024-07-05'
        ]);
    }
}
