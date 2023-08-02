<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->id();
            $table->string('kode_retur');
            $table->string('kode_surat_jalan');
            $table->string('nama_petugas');
            $table->string('nama_supplier');
            $table->string('nama_barang');
            $table->integer('quantity_retur'); 
            $table->date('tanggal_retur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur');
    }
};
