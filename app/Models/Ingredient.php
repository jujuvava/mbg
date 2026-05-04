<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'ingredients';

    /**
     * Kolom yang diizinkan untuk pengisian massal (Mass Assignment).
     * Mencakup data gizi makro, mikro, dan harga.
     */
    protected $fillable = [
        'name',
        'energy',       // E (kkal)
        'protein',      // P (gr)
        'fat',          // L (gr)
        'carbohydrate', // KH (gr)
        'iron',         // Fe (mg)
        'sodium',       // Na (mg)
        'fiber',        // Serat (gr)
        'calcium',      // Ca (mg)
        'potassium',    // K (mg)
        'price_per_kg'  // Harga per kilogram untuk estimasi biaya
    ];

    /**
     * Casting tipe data agar angka tetap akurat (decimal/float).
     */
    protected $casts = [
        'energy' => 'float',
        'protein' => 'float',
        'fat' => 'float',
        'carbohydrate' => 'float',
        'iron' => 'float',
        'sodium' => 'float',
        'fiber' => 'float',
        'calcium' => 'float',
        'potassium' => 'float',
        'price_per_kg' => 'float',
    ];

    /**
     * Relasi Many-to-Many ke model Menu.
     * Digunakan untuk menghitung total gizi dan biaya dalam satu menu.
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_ingredient')
            ->withPivot('weight_gram')
            ->withTimestamps();
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function purchaseLogs()
    {
        return $this->hasMany(PurchaseLog::class);
    }
}
