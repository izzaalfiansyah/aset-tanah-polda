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
        Schema::table('tanah_polda_kesatuan', function (Blueprint $table) {
            $table->foreignId('user_id')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tanah_polda_kesatuan', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
