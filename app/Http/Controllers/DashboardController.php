<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Expenditure;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // 1. Ambil total pagu anggaran dari semua sumber dana
            $totalBudget = Budget::sum('amount') ?? 0;

            // 2. Ambil total seluruh pengeluaran yang sudah dicatat
            $totalSpent = Expenditure::sum('total_cost') ?? 0;

            // 3. Hitung sisa saldo
            $remainingBalance = $totalBudget - $totalSpent;

            // 4. Hitung persentase penggunaan (cegah division by zero)
            $usagePercentage = $totalBudget > 0 
                ? ($totalSpent / $totalBudget) * 100 
                : 0;

            // 5. Hitung total porsi yang sudah dibagikan
            $totalPortions = Expenditure::sum('portion_count') ?? 0;

            // 6. Ambil 5 transaksi terakhir dengan relasi menu (untuk tabel di dashboard)
            $recentExpenditures = Expenditure::with(['budget', 'menu'])
                                    ->orderBy('date', 'desc')
                                    ->take(5)
                                    ->get();

            // Kirim data ke view dashboard.blade.php
            return view('dashboard', compact(
                'totalBudget', 
                'totalSpent', 
                'remainingBalance', 
                'usagePercentage',
                'totalPortions',
                'recentExpenditures'
            ));

        } catch (\Exception $e) {
            // Jika ada error (misal tabel belum ada), tampilkan pesan error agar tidak loading selamanya
            return "Terjadi kesalahan pada Dashboard: " . $e->getMessage();
        }
    }
}