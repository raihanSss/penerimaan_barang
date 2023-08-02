<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_penerimaan',
        'kode_retur',
        'kode_surat_jalan',
        'nama_petugas',
        'nama_supplier',
        'nama_barang',
        'quantity',
        'quantity_retur',
        'tanggal_terima',
        'tanggal_retur',
    ];

    public function penerimaan()
    {
        return $this->belongsTo(Penerimaan::class, 'kode_penerimaan', 'kode_penerimaan');
    }

    public function retur()
    {
        return $this->belongsTo(Retur::class, 'kode_retur', 'kode_retur');
    }
}
