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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penggunaan')->constrained('penggunaans')->cascadeOnDelete();
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->cascadeOnDelete();
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('jumlah_meter');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
