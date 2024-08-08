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
        Schema::create('tanah_polda_kesatuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('sudah_sertifikat_jumlah_luas')->nullable();
            $table->integer('sudah_sertifikat_jumlah_persil')->nullable();
            $table->integer('hibah_luas')->nullable();
            $table->integer('hibah_persil')->nullable();
            $table->integer('swadaya_luas')->nullable();
            $table->integer('swadaya_persil')->nullable();
            $table->integer('sengketa_luas')->nullable();
            $table->integer('sengketa_persil')->nullable();
            $table->integer('pinjam_pakai_luas')->nullable();
            $table->integer('pinjam_pakai_persil')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanah_polda_kesatuan');
    }
};
