<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = Ingredient::all();

        foreach ($ingredients as $item) {
            Inventory::create([
                'ingredient_id' => $item->id,
                'stock_kg' => 100.000, // Stok awal default 100 Kg per bahan
                'min_stock_kg' => 10.000,
                'warehouse_location' => 'Gudang Pusat Ketapang',
            ]);
        }
    }
}
