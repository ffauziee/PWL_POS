<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barang = [
            // Barang dari Kategori 1
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop Asus ROG',
                'harga_beli' => 18000000,
                'harga_jual' => 20000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Mouse Logitech G502',
                'harga_beli' => 750000,
                'harga_jual' => 850000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Keyboard Razer BlackWidow',
                'harga_beli' => 1600000,
                'harga_jual' => 1800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Monitor LG UltraWide',
                'harga_beli' => 3200000,
                'harga_jual' => 3500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Headset HyperX Cloud II',
                'harga_beli' => 1300000,
                'harga_jual' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Barang dari Kategori 2
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Smartphone Samsung S24',
                'harga_beli' => 14000000,
                'harga_jual' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Tablet iPad Air',
                'harga_beli' => 11000000,
                'harga_jual' => 12000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Smartwatch Garmin Fenix 7',
                'harga_beli' => 8500000,
                'harga_jual' => 9000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Charger Anker 100W',
                'harga_beli' => 700000,
                'harga_jual' => 750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Powerbank Xiaomi 20000mAh',
                'harga_beli' => 450000,
                'harga_jual' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Barang dari Kategori 3
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG011',
                'barang_nama' => 'Printer Epson L3150',
                'harga_beli' => 2800000,
                'harga_jual' => 3200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG012',
                'barang_nama' => 'Scanner Fujitsu ScanSnap',
                'harga_beli' => 4000000,
                'harga_jual' => 4500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG013',
                'barang_nama' => 'Projector BenQ MW560',
                'harga_beli' => 5500000,
                'harga_jual' => 6000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG014',
                'barang_nama' => 'SSD Samsung 2TB NVMe',
                'harga_beli' => 3200000,
                'harga_jual' => 3500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG015',
                'barang_nama' => 'Router TP-Link AX73',
                'harga_beli' => 1600000,
                'harga_jual' => 1800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('m_barang')->insert($barang);
    }
}
