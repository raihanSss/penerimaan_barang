<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'nip',
        'nama_petugas',
        'alamat_petugas',
        'no_telp_petugas',
        'jabatan',
    ];

    public function suratJalan()
    {
        return $this->hasMany(SuratJalan::class, 'nama_petugas', 'nama_petugas');
    }
}
