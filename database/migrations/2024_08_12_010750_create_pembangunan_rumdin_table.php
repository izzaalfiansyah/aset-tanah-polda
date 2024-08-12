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
        Schema::create('pembangunan_rumdin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->default('0');
            $table->string('nama')->nullable();
            $table->string('jenis_bangunan')->nullable();
            $table->integer('tipe')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('sumber_gar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembangunan_rumdin');
    }
};
