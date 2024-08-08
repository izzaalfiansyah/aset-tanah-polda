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
        Schema::create('rumdin_golongan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('parent_id')->default('0');
            $table->integer('jumlah_personel')->nullable();
            $table->integer('rumah_dinas_jumlah')->nullable();
            $table->integer('rumah_dinas_kapasitas')->nullable();
            $table->integer('rumah_dinas_polri_aktif')->nullable();
            $table->integer('rumah_dinas_polri_punra')->nullable();
            $table->integer('rumah_dinas_non_polri')->nullable();
            $table->integer('rumah_non_dinas_pribadi')->nullable();
            $table->integer('rumah_non_dinas_orang_tua')->nullable();
            $table->integer('rumah_non_dinas_sewa')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumdin_golongan');
    }
};
