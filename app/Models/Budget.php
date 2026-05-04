<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'source_name', 
        'amount', 
        'start_date', 
        'end_date', 
        'description'
    ];
}