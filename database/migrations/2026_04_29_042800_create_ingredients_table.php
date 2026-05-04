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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('energy', 8, 2)->default(0);
            $table->decimal('protein', 8, 2)->default(0);
            $table->decimal('fat', 8, 2)->default(0);
            $table->decimal('carbohydrate', 8, 2)->default(0);

            // Tambahkan kolom gizi mikro sesuai data image_c30e7d.png
            $table->decimal('iron', 8, 2)->default(0);
            $table->decimal('sodium', 8, 2)->default(0);
            $table->decimal('fiber', 8, 2)->default(0);
            $table->decimal('calcium', 8, 2)->default(0);
            $table->decimal('potassium', 8, 2)->default(0);

            // Kolom harga yang sebelumnya kita tambahkan
            $table->decimal('price_per_kg', 12, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
