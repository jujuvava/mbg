@extends('layouts.app')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Histori Pengadaan Barang</h1>
                <p class="text-sm text-gray-600">Catatan pembelian bahan pangan dari supplier/produsen.</p>
            </div>
            <a href="{{ route('purchases.create') }}"
                class="px-4 py-2 text-sm text-white transition bg-green-600 rounded-lg hover:bg-green-700">
                + Tambah Pembelian
            </a>
        </div>

        <!-- Tabel Histori Pembelian -->
        <div class="overflow-hidden bg-white border border-gray-200 shadow-md rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Bahan Pangan</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Supplier</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Total Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($purchases as $purchase)
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 whitespace-nowrap">
                                {{ strtoupper($purchase->ingredient->name) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $purchase->supplier_name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                {{ number_format($purchase->amount_kg, 2) }} Kg
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap">
                                Rp {{ number_format($purchase->total_cost, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                Belum ada data pembelian tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (session('success'))
            <div class="fixed px-6 py-3 text-white bg-green-600 rounded-lg shadow-lg bottom-5 right-5">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
