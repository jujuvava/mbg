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
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->date('date'); // Tanggal pelaksanaan makan gratis
            $table->integer('portion_count'); // Jumlah porsi/anak
            $table->decimal('cost_per_portion', 10, 2); // Harga riil saat itu
            $table->decimal('total_cost', 15, 2); // Hasil perkalian porsi * cost
            $table->string('location'); // Lokasi distribusi (misal: Nama Sekolah)
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenditures');
    }
};
