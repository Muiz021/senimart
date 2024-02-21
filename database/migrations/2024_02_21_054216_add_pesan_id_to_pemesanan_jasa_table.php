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
            $table->unsignedBigInteger('pesan_id')->after('jasa_id')->index('fk_pemesanan_jasa_to_pesan')->nullable();
            $table->foreign('pesan_id')->references('id')->on('pesan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_jasa', function (Blueprint $table) {
            $table->dropForeign('fk_pemesanan_jasa_to_pesan');
        });
    }
};
