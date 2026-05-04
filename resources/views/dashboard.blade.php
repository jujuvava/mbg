@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Ringkasan Laporan</h1>
            <span class="text-sm text-gray-500">{{ now()->format('d F Y') }}</span>
        </div>

        <!-- Statistik Laporan Pengeluaran -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-500 uppercase">Total Pengeluaran Menu</p>
                <h2 class="text-3xl font-bold text-emerald-600 mt-1">
                    Rp {{ number_format($totalSpending ?? 0, 0, ',', '.') }}
                </h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <p class="text-sm font-medium text-gray-500 uppercase">Jumlah Menu Aktif</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalMenus ?? 0 }}</h2>
            </div>
        </div>

        <!-- Kontrol Menu Utama -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h3 class="font-bold text-gray-700">Daftar Kontrol Menu</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('ingredients.index') }}"
                        class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-200 transition border border-gray-200">
                        📦 Gudang Gizi
                    </a>
                    <a href="{{ route('menus.create') }}"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                        + Tambah Menu
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 text-gray-400 text-xs uppercase">
                            <th class="px-6 py-4 font-medium">Nama Menu</th>
                            <th class="px-6 py-4 font-medium text-right">Biaya (Est)</th>
                            <th class="px-6 py-4 font-medium text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        @forelse($recentMenus as $menu)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $menu->name }}</td>
                                <td class="px-6 py-4 text-right text-gray-600">Rp
                                    {{ number_format($menu->estimated_cost, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center space-x-3">
                                        <a href="{{ route('menus.edit', $menu->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus menu ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">Belum ada menu yang
                                    terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($totalMenus > 5)
                <div class="p-4 text-center border-t border-gray-50">
                    <a href="{{ route('menus.index') }}" class="text-sm text-gray-500 hover:text-indigo-600">Lihat Semua
                        Menu &rarr;</a>
                </div>
            @endif
        </div>
    </div>
@endsection
