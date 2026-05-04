<?php

namespace App\Http\Controllers;

// Pastikan baris di bawah ini ada agar tidak error merah
use App\Models\Menu;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar semua menu.
     */
    public function index()
    {
        $menus = Menu::with('ingredients')->latest()->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Form untuk membuat menu baru.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('menus.create', compact('ingredients'));
    }

    /**
     * Menyimpan menu baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'weights' => 'required|array',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $menu = Menu::create([
                    'name' => $request->name,
                    'notes' => $request->notes,
                    'calories' => 0,
                    'estimated_cost' => 0,
                ]);

                $this->calculateMenuData($menu, $request);
            });

            return redirect()->route('menus.index')->with('success', 'Menu berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    /**
     * Form edit menu.
     */
    public function edit(Menu $menu)
    {
        $ingredients = Ingredient::all();
        return view('menus.edit', compact('menu', 'ingredients'));
    }

    /**
     * Memperbarui menu.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'weights' => 'required|array',
        ]);

        try {
            DB::transaction(function () use ($request, $menu) {
                $menu->update([
                    'name' => $request->name,
                    'notes' => $request->notes,
                ]);

                $this->calculateMenuData($menu, $request);
            });

            return redirect()->route('menus.index')->with('success', 'Menu diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui: ' . $e->getMessage());
        }
    }

    /**
     * Fungsi Helper untuk menghitung Kalori dan Biaya secara otomatis.
     */
    private function calculateMenuData(Menu $menu, Request $request)
    {
        $totalCalories = 0;
        $totalCost = 0;
        $syncData = [];

        foreach ($request->ingredients as $index => $ingredientId) {
            $weight = $request->weights[$index];

            // Mencari data di Gudang Gizi
            $ingredient = Ingredient::firstWhere('id', $ingredientId);

            if ($ingredient && $weight > 0) {
                // Rumus: (Energi / 100) * berat
                $totalCalories += ($ingredient->energy / 100) * $weight;

                // Rumus: (Harga per Kg / 1000) * berat
                $totalCost += ($ingredient->price_per_kg / 1000) * $weight;

                $syncData[$ingredientId] = ['weight_gram' => $weight];
            }
        }

        // Simpan relasi ke tabel pivot
        $menu->ingredients()->sync($syncData);

        // Update data akumulasi di tabel menu
        $menu->update([
            'calories' => $totalCalories,
            'estimated_cost' => $totalCost,
        ]);
    }

    /**
     * Menghapus menu.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu dihapus.');
    }
}
