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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_level']);
            $table->dropColumn('id_level');
            $table->enum('role', ['admin', 'user', 'staff'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->unsignedBigInteger('id_level');
            $table->foreign('id_level')->references('id')->on('levels')->cascadeOnDelete();
        });
    }
};
