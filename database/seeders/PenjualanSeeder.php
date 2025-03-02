<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $penjualan = [
            [
                'user_id' => 3, // Staff/Kasir
                'pembeli' => 'Budi Santoso',
                'penjualan_kode' => 'PJN001',
                'penjualan_tanggal' => '2025-02-01 10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Siti Aminah',
                'penjualan_kode' => 'PJN002',
                'penjualan_tanggal' => '2025-02-02 14:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Joko Widodo',
                'penjualan_kode' => 'PJN003',
                'penjualan_tanggal' => '2025-02-03 09:45:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Agus Salim',
                'penjualan_kode' => 'PJN004',
                'penjualan_tanggal' => '2025-02-04 16:15:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Dewi Sartika',
                'penjualan_kode' => 'PJN005',
                'penjualan_tanggal' => '2025-02-05 11:10:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_penjualan')->insert($penjualan);
    }
}
