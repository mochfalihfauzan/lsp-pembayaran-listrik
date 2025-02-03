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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tagihan')->constrained('tagihans')->cascadeOnDelete();
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->cascadeOnDelete();
            $table->integer('bulan_bayar');
            $table->integer('biaya_admin');
            $table->integer('total_bayar');
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
