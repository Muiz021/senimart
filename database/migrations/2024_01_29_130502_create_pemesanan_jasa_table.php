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
        Schema::create('pemesanan_jasa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_ponsel');
            $table->dateTime('tanggal');
            $table->string('tema');
            $table->time('jam');
            $table->longText('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_jasa');
    }
};
