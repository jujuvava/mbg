<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel ingredients yang sudah Anda buat sebelumnya
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');

            // Stok dalam satuan Kilogram (Kg)
            $table->decimal('stock_kg', 12, 3)->default(0);

            // Batas minimum stok untuk sistem peringatan (Alert)
            $table->decimal('min_stock_kg', 12, 3)->default(5.000);

            // Lokasi gudang (opsional, berguna jika ada beberapa titik distribusi di Ketapang)
            $table->string('warehouse_location')->default('Gudang Utama');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
