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
        Schema::create('distribution_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained();
            $table->integer('total_porsi');
            $table->decimal('total_estimated_cost', 15, 2); // Untuk laporan anggaran
            $table->timestamps(); // Ini akan otomatis mencatat tanggal distribusi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_logs');
    }
};
