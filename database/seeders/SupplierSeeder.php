<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'nama_supplier' => 'PT. Foxa Asa Energi',
            'alamat_supplier' => 'permata regency D/37 , Kembangan, Jakarta Barat, Jakarta, Indonesia',
            'no_telp_supplier' => '0812345678'
        ]);

        Supplier::create([
            'nama_supplier' => 'CV. Dua Putra Petir',
            'alamat_supplier' => 'Bukit Palma Blok C5 No.33 Citraland Utara Surabaya barat, Surabaya, Surabaya, Indonesia',
            'no_telp_supplier' => '0898765432'
        ]);

        Supplier::create([
            'nama_supplier' => 'Planet Party',
            'alamat_supplier' => 'Keboan Sikep Rt 4 Rw1 Gedangan, Sidoarjo, Surabaya, Indonesia',
            'no_telp_supplier' => '0891212169'
        ]);
    
    }
}
