<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistributionController extends Controller
{
    /**
     * Menampilkan halaman form distribusi.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('distribusi.index', compact('menus'));
    }

    /**
     * Memproses pemotongan stok (Metode ini harus bernama 'store').
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'total_porsi' => 'required|integer|min:1',
        ]);

        $menu = Menu::with('ingredients')->findOrFail($request->menu_id);
        $totalPorsi = $request->total_porsi;

        try {
            DB::transaction(function () use ($menu, $totalPorsi) {
                // Logika pemotongan stok (seperti sebelumnya)
                foreach ($menu->ingredients as $ingredient) {
                    $totalNeededKg = ($ingredient->pivot->weight_gram * $totalPorsi) / 1000;
                    $inventory = Inventory::lockForUpdate()->firstWhere('ingredient_id', $ingredient->id);
                    $inventory->decrement('stock_kg', $totalNeededKg);
                }

                // CATAT KE RIWAYAT
                \App\Models\DistributionLog::create([
                    'menu_id' => $menu->id,
                    'total_porsi' => $totalPorsi,
                    'total_estimated_cost' => $menu->estimated_cost * $totalPorsi,
                ]);
            });

            return back()->with('success', "Distribusi berhasil dicatat!");
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function history()
    {
        $logs = \App\Models\DistributionLog::with('menu')->latest()->get();
        return view('distribusi.history', compact('logs'));
    }
}
