<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    protected $table = 'surat_jalan';

    protected $fillable = [
        'kode_surat_jalan',
        'nama_petugas',
        'nama_supplier',
        'tanggal_masuk',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nama_petugas', 'nama_petugas');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'nama_supplier', 'nama_supplier');
    }

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class, 'kode_surat_jalan', 'kode_surat_jalan');
    }

    public function retur()
    {
        return $this->hasMany(Retur::class, 'kode_surat_jalan', 'kode_surat_jalan');
    }
}
