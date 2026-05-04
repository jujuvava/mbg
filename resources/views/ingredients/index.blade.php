@extends('layouts.app')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Gudang Gizi & Inventory</h1>
                <p class="text-sm text-gray-600">Pemantauan stok dan kandungan gizi untuk Program Makan Gratis.</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('distribusi.index') }}"
                    class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Proses Distribusi
                </a>
            </div>
        </div>

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-3">
            <div class="p-4 bg-white border border-gray-100 shadow-sm rounded-xl">
                <p class="text-xs font-semibold text-gray-500 uppercase">Total Jenis Bahan</p>
                <p class="text-2xl font-bold text-gray-800">{{ $ingredients->count() }}</p>
            </div>
            <div class="p-4 bg-white border border-gray-100 shadow-sm rounded-xl">
                <p class="text-xs font-semibold text-gray-500 uppercase">Stok Kritis</p>
                <p class="text-2xl font-bold text-red-600">
                    {{ $ingredients->filter(fn($i) => ($i->inventory->stock_kg ?? 0) <= ($i->inventory->min_stock_kg ?? 5))->count() }}
                </p>
            </div>
            <div class="p-4 bg-white border border-gray-100 shadow-sm rounded-xl">
                <p class="text-xs font-semibold text-gray-500 uppercase">Lokasi Utama</p>
                <p class="text-2xl font-bold text-gray-800">Gudang Ketapang</p>
            </div>
        </div>

        <!-- Tabel Utama -->
        <div class="overflow-hidden bg-white border border-gray-200 shadow-md rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Bahan Pangan</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Energi (kkal)</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Protein (g)</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Stok Gudang</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ingredients as $item)
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900 uppercase">{{ $item->name }}</div>
                                <div class="text-xs text-gray-500">Harga: Rp
                                    {{ number_format($item->price_per_kg, 0, ',', '.') }}/kg</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $item->energy }} <span class="text-xs">/100g</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $item->protein }}g
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold {{ ($item->inventory->stock_kg ?? 0) <= ($item->inventory->min_stock_kg ?? 5) ? 'text-red-600' : 'text-gray-800' }}">
                                    {{ number_format($item->inventory->stock_kg ?? 0, 2) }} Kg
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $stok = $item->inventory->stock_kg ?? 0;
                                    $min = $item->inventory->min_stock_kg ?? 5;
                                @endphp

                                @if ($stok <= 0)
                                    <span
                                        class="px-2 py-1 text-xs font-medium text-white bg-black rounded-full">Habis</span>
                                @elseif($stok <= $min)
                                    <span
                                        class="px-2 py-1 text-xs italic font-medium font-bold text-red-800 bg-red-100 rounded-full">⚠️
                                        Re-stock</span>
                                @else
                                    <span
                                        class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Tersedia</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                <a href="{{ route('ingredients.edit', $item->id) }}"
                                    class="px-3 py-1 text-blue-600 transition rounded-md hover:text-blue-900 bg-blue-50">
                                    Update Stok
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (session('success'))
            <div id="toast" class="fixed px-6 py-3 text-white bg-green-600 rounded-lg shadow-lg bottom-5 right-5">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('toast').remove();
                }, 3000);
            </script>
        @endif
    </div>
@endsection
