<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionLog extends Model
{
    use HasFactory;

    /**
     * Properti fillable untuk mengizinkan mass assignment.
     * Menambahkan menu_id, total_porsi, dan total_estimated_cost.
     */
    protected $fillable = [
        'menu_id',
        'total_porsi',
        'total_estimated_cost',
    ];

    /**
     * Relasi ke model Menu agar nama menu bisa ditampilkan di laporan.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
