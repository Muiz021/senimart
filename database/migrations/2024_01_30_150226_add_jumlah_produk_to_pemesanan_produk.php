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
        Schema::table('pemesanan_produk', function (Blueprint $table) {
            $table->integer('jumlah_produk')->after('nomor_ponsel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_produk', function (Blueprint $table) {
            $table->dropColumn('jumlah_produk');
        });
    }
};
