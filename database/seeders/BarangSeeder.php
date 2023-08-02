<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'kode_barang' => 'BRG-432',
            'nama_barang' => 'BOD',
            'stok_barang' => '10'
        ]);

        Barang::create([
            'kode_barang' => 'BRG-987',
            'nama_barang' => 'DHS',
            'stok_barang' => '15'
        ]);

        Barang::create([
            'kode_barang' => 'BRG-398',
            'nama_barang' => 'Winter',
            'stok_barang' => '12'
        ]);

        Barang::create([
            'kode_barang' => 'BRG-311',
            'nama_barang' => 'Won',
            'stok_barang' => '22'
        ]);
    }
}
