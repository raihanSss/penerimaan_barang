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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penerimaan')->nullable();
            $table->string('kode_retur')->nullable();
            $table->string('kode_surat_jalan')->nullable();
            $table->string('nama_petugas')->nullable();
            $table->string('nama_supplier')->nullable();
            $table->string('nama_barang')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('quantity_retur')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->date('tanggal_retur')->nullable();
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
        Schema::dropIfExists('reports');
    }
};
