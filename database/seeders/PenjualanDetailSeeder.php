<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $penjualanDetailData = [];

        // Ambil semua penjualan_id dari tabel penjualan
        $penjualanIds = DB::table('m_penjualan')->pluck('penjualan_id')->toArray();

        // Ambil semua barang_id dari tabel m_barang
        $barangIds = DB::table('m_barang')->pluck('barang_id')->toArray();

        if (empty($penjualanIds) || empty($barangIds)) {
            return; // Jika tidak ada data, hentikan seeder
        }

        foreach ($penjualanIds as $penjualanId) {
            // Pastikan barang yang dipilih tidak lebih banyak dari yang tersedia
            $jumlahBarang = min(3, count($barangIds));
            $selectedBarangIds = (array) array_rand(array_flip($barangIds), $jumlahBarang);

            foreach ($selectedBarangIds as $barangId) {
                // Ambil harga jual dari tabel m_barang
                $harga = DB::table('m_barang')->where('barang_id', $barangId)->value('harga_jual');

                $penjualanDetailData[] = [
                    'penjualan_id' => $penjualanId,
                    'barang_id' => $barangId,
                    'harga' => $harga ?? 0, // Default 0 jika harga tidak ditemukan
                    'jumlah' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert data ke tabel t_penjualan_detail
        DB::table('t_penjualan_detail')->insert($penjualanDetailData);
    }
}
