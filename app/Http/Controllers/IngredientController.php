<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Menampilkan daftar bahan pangan beserta informasi gizi
     * dan sisa stok di gudang.
     */
    public function index()
    {
        // Mengambil data bahan pangan beserta relasi inventory-nya
        // Eager loading 'inventory' untuk efisiensi database
        $ingredients = Ingredient::with('inventory')->get();

        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Menampilkan form edit stok atau gizi bahan tertentu.
     */
    public function edit(Ingredient $ingredient)
    {
        // Load relasi inventory agar stok saat ini muncul di form
        $ingredient->load('inventory');
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update stok secara manual (misal saat ada kiriman barang baru ke gudang).
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'stock_kg' => 'required|numeric|min:0',
            'min_stock_kg' => 'required|numeric|min:0',
        ]);

        // Update atau buat data inventory baru
        $ingredient->inventory()->updateOrCreate(
            ['ingredient_id' => $ingredient->id],
            [
                'stock_kg' => $request->stock_kg,
                'min_stock_kg' => $request->min_stock_kg,
            ]
        );

        return redirect()->route('ingredients.index')
            ->with('success', "Stok {$ingredient->name} berhasil diperbarui.");
    }
}
