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
        Schema::create('rumdin', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('parent_id')->default('0');
            $table->integer('rumah_tapak_jumlah')->nullable();
            $table->integer('rumah_tapak_kapasitas')->nullable();
            $table->integer('mess_jumlah')->nullable();
            $table->integer('mess_kapasitas')->nullable();
            $table->integer('rusun_jumlah')->nullable();
            $table->integer('rusun_kapasitas')->nullable();
            $table->integer('rusus_jumlah')->nullable();
            $table->integer('rusus_kapasitas')->nullable();
            $table->integer('barak_jumlah')->nullable();
            $table->integer('barak_kapasitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumdin');
    }
};
