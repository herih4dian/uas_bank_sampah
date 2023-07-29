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
        Schema::create('master_harga_sampah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_master_jenis_sampah')->unsigned();
            $table->foreign('id_master_jenis_sampah')->references('id')->on('master_jenis_sampah');  
            $table->float('harga_sampah', 10, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_harga_sampah');
    }
};
