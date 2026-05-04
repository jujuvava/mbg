<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk diisi secara massal.
     * Tambahkan stock_kg dan min_stock_kg ke sini.
     */
    protected $fillable = [
        'ingredient_id',
        'stock_kg',
        'min_stock_kg',
        'warehouse_location',
    ];

    /**
     * Relasi balik ke Ingredient.
     */
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
