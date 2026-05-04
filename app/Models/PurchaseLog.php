<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseLog extends Model
{
    protected $fillable = [
        'ingredient_id',
        'supplier_name',
        'amount_kg',
        'price_per_kg',
        'total_cost',
        'purchase_date'
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
