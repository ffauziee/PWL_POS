<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run()
    {
        $stock = [
            // Stok Barang dari Supplier 1
            ['barang_id' => 1, 'supplier_id' => 1, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 2, 'supplier_id' => 1, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 3, 'supplier_id' => 1, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 4, 'supplier_id' => 1, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 5, 'supplier_id' => 1, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 20, 'created_at' => now(), 'updated_at' => now()],

            // Stok Barang dari Supplier 2
            ['barang_id' => 6, 'supplier_id' => 2, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 7, 'supplier_id' => 2, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 8, 'supplier_id' => 2, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 9, 'supplier_id' => 2, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 10, 'supplier_id' => 2, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 60, 'created_at' => now(), 'updated_at' => now()],

            // Stok Barang dari Supplier 3
            ['barang_id' => 11, 'supplier_id' => 3, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 12, 'supplier_id' => 3, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 13, 'supplier_id' => 3, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 14, 'supplier_id' => 3, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 15, 'supplier_id' => 3, 'user_id' => 3, 'stock_tanggal' => now(), 'stock_jumlah' => 30, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('t_stock')->insert($stock);
    }
}
