<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $table = 'penerimaan';

    protected $fillable = [
        'kode_penerimaan',
        'kode_surat_jalan',
        'nama_petugas',
        'nama_supplier',
        'nama_barang',
        'quantity',
        'tanggal_terima'
    ];

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class, 'kode_surat_jalan', 'kode_surat_jalan');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'nama_supplier', 'nama_supplier');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang', 'nama_barang');
    }
}