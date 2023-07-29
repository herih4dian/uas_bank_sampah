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
        Schema::create('master_jenis_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('type_sampah', 100);
            $table->timestamps();
        });

        // Schema::create('content', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('topik', 100);
        //     $table->string('materi', 200);
        //     $table->text('konten', );
        //     $table->string('keterangan', 300);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_jenis_sampah');
    }
};
