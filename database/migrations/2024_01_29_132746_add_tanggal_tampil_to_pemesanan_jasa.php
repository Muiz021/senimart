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
        Schema::table('pemesanan_jasa', function (Blueprint $table) {
            $table->dropColumn('tanggal');
            $table->date('tanggal_pesan')->after('nomor_ponsel');
            $table->date('tanggal_tampil')->after('tanggal_pesan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_jasa', function (Blueprint $table) {
            $table->dropColumn('tanggal_pesan');
            $table->dropColumn('tanggal_tampil');
        });
    }
};
