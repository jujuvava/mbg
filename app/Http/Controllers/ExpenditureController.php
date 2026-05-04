<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Budget;
use App\Models\Menu;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExpenditureController extends Controller
{
    public function create()
    {
        $budgets = Budget::all();
        $menus = Menu::all();
        return view('expenditures.create', compact('budgets', 'menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'budget_id' => 'required|exists:budgets,id',
            'menu_id' => 'required|exists:menus,id',
            'date' => 'required|date',
            'portion_count' => 'required|integer|min:1',
            'cost_per_portion' => 'required|numeric',
            'location' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('expenditures', 'public');
            $validated['photo'] = $path;
        }

        $validated['total_cost'] = $request->portion_count * $request->cost_per_portion;

        Expenditure::create($validated);

        return redirect()->route('dashboard')->with('success', 'Data dan foto berhasil disimpan!');
    }

    public function exportPdf()
    {
        $expenditures = Expenditure::with(['budget', 'menu'])->orderBy('date', 'desc')->get();

        // Data tambahan untuk header laporan
        $data = [
            'title' => 'Laporan Pengeluaran Makan Bergizi Gratis',
            'date' => date('d/m/Y'),
            'expenditures' => $expenditures,
            'total_spent' => $expenditures->sum('total_cost'),
            'total_portions' => $expenditures->sum('portion_count'),
        ];

        $pdf = Pdf::loadView('expenditures.pdf', $data);

        // Download file dengan nama spesifik
        return $pdf->download('laporan-makan-bergizi-' . date('Y-m-d') . '.pdf');
    }
}
