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
        Schema::table('lokasis', function (Blueprint $table) {
            $table->foreignId('provinsi_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('kabupaten_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lokasis', function (Blueprint $table) {
            $table->dropForeign('provinsi_id');
            $table->dropForeign('kabupaten_id');
        });
    }
};
