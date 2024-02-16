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
            $table->unsignedBigInteger('jasa_id')->nullable()->after('id');
            $table->foreign('jasa_id')->references('id')->on('jasas')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['selesai', 'proses','ditolak'])->nullable()->after('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan_jasa', function (Blueprint $table) {
            $table->dropForeign('pemesanan_jasa_jasa_id_foreign');
            $table->dropColumn('jasa_id');
            $table->dropColumn('status');
        });
    }
};
