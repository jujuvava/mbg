<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Inventory;
use App\Models\PurchaseLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Menampilkan histori semua pembelian barang.
     */
    public function index()
    {
        $purchases = PurchaseLog::with('ingredient')->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Menampilkan form untuk mencatat pembelian baru.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('purchases.create', compact('ingredients'));
    }

    /**
     * Menyimpan data pembelian dan menambah stok di inventory.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'supplier_name' => 'required|string|max:255',
            'amount_kg'     => 'required|numeric|min:0.01',
            'price_per_kg'  => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 1. Simpan Log Pembelian
                PurchaseLog::create([
                    'ingredient_id' => $request->ingredient_id,
                    'supplier_name' => $request->supplier_name,
                    'amount_kg'     => $request->amount_kg,
                    'price_per_kg'  => $request->price_per_kg,
                    'total_cost'    => $request->amount_kg * $request->price_per_kg,
                    'purchase_date' => $request->purchase_date,
                ]);

                // 2. Update Stok di Inventory (Increment)
                $inventory = Inventory::firstOrCreate(
                    ['ingredient_id' => $request->ingredient_id],
                    ['stock_kg' => 0, 'min_stock_kg' => 5]
                );

                $inventory->increment('stock_kg', $request->amount_kg);
            });

            return redirect()->route('purchases.index')
                ->with('success', 'Pembelian berhasil dicatat dan stok otomatis bertambah.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
