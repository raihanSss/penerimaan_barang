<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $table = 'retur';

    protected $fillable = [
        'kode_retur',
        'kode_surat_jalan',
        'nama_petugas',
        'nama_supplier',
        'nama_barang',
        'quantity_retur',
        'tanggal_retur',
    ];

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 'kode_surat_jalan', 'kode_surat_jalan');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'nama_barang');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'nama_supplier', 'nama_supplier');
    }
}
