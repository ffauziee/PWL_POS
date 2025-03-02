<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SUP001',
                'supplier_name' => 'PT. Nusantara Digital Solutions',
                'supplier_alamat' => 'Jl. Merdeka No. 45, Jakarta Pusat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SUP002',
                'supplier_name' => 'CV. Sentra Teknologi Indonesia',
                'supplier_alamat' => 'Jl. Raya Soekarno-Hatta No. 21, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SUP003',
                'supplier_name' => 'PT. Inovasi Jaya Abadi',
                'supplier_alamat' => 'Jl. Sudirman No. 88, Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
