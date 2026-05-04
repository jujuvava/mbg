<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expenditure extends Model
{
    protected $fillable = [
        'budget_id',
        'menu_id',
        'date',
        'portion_count',
        'cost_per_portion',
        'total_cost',
        'location',
        'photo',
        'notes'
    ];

    /**
     * Relasi ke Budget (Anggaran)
     */
    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    /**
     * Relasi ke Menu
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
