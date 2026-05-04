<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property float $calories
 * @property float $estimated_cost
 * @property string|null $notes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu latest(string $column = 'created_at')
 * @method static Menu|null find(mixed $id, array $columns = ['*'])
 * @method static Menu create(array $attributes = [])
 * @method bool delete()
 */

/**
 * @method bool|null delete()
 * @method static int count(mixed $columns = '*')
 */

class Menu extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'notes',
        'calories',
        'estimated_cost'
    ];

    /**
     * Relasi Many-to-Many ke Model Ingredient (Gudang Gizi).
     * Menghubungkan menu dengan bahan makanan melalui tabel pivot menu_ingredient.
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'menu_ingredient')
            ->withPivot('weight_gram') // Mengambil data berat dari tabel pivot
            ->withTimestamps();
    }

    /**
     * Casting tipe data agar nilai kalori selalu terbaca sebagai angka desimal.
     */
    protected $casts = [
        'calories' => 'float',
        'estimated_cost' => 'float',
    ];
}
