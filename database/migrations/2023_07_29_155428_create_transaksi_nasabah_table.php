<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_nasabah_table', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_transaksi");
            $table->bigInteger('id_nasabah')->unsigned();
            $table->foreign('id_nasabah')->references('id')->on('master_nasabah');  
            $table->bigInteger('id_jenis_sampah')->unsigned();
            $table->foreign('id_jenis_sampah')->references('id')->on('master_jenis_sampah');  
            $table->integer('satuans');
            $table->bigInteger('satuan_status')->unsigned();
            $table->foreign('satuan_status')->references('id')->on('master_satuan_tables');  

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_nasabah_table');
    }
};