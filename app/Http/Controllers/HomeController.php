<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware; // Tambahkan ini
use Illuminate\Routing\Controllers\Middleware;    // Tambahkan ini

class HomeController extends Controller implements HasMiddleware
{
    /**
     * Tentukan middleware untuk controller ini secara statis.
     */
    public static function middleware(): array
    {
        return [
            // Semua fungsi di controller ini wajib login
            'auth',

            // Contoh jika ingin spesifik:
            // new Middleware('auth', only: ['index']),
        ];
    }

    public function index()
    {
        $totalMenus = Menu::count();
        $totalSpending = Menu::sum('estimated_cost'); // Total Pengeluaran
        $recentMenus = Menu::latest()->take(5)->get();

        return view('dashboard', compact('totalMenus', 'totalSpending', 'recentMenus'));
    }
}
