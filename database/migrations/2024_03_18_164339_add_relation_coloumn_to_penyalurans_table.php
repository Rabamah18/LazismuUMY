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
        Schema::table('penyalurans', function (Blueprint $table) {
            //$table->foreignId('penerima_manfaat_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ashnaf_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('pilar_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('program_pilar_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('provinsi_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('kabupaten_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tahun_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyalurans', function (Blueprint $table) {
            //$table->dropForeign('penerima_manfaat_id');
            $table->dropForeign('ashnaf_id');
            $table->dropForeign('pilar_id');
            $table->dropForeign('provinsi_id');
            $table->dropForeign('kabupaten_id');
            $table->dropForeign('tahun_id');
        });
    }
};
