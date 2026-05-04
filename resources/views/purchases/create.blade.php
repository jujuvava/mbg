@extends('layouts.app')

@section('content')
    <div class="max-w-2xl p-8 py-10 mx-auto bg-white shadow-md rounded-xl">
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Catat Pembelian Bahan Pangan</h2>

        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <!-- Pilih Bahan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilih Bahan Pangan</label>
                    <select name="ingredient_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                        @foreach ($ingredients as $item)
                            <option value="{{ $item->id }}">{{ strtoupper($item->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Supplier -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Produsen / Supplier</label>
                    <input type="text" name="supplier_name" placeholder="Contoh: Toko Beras Ketapang Jaya"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Jumlah -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah (Kg)</label>
                        <input type="number" name="amount_kg" step="0.01"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga Per Kg (Rp)</label>
                        <input type="number" name="price_per_kg"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    </div>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
                    <input type="date" name="purchase_date" value="{{ date('Y-m-d') }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                </div>

                <button type="submit"
                    class="w-full py-2 font-bold text-white transition bg-green-600 rounded-lg shadow hover:bg-green-700">
                    Simpan & Tambah Stok
                </button>
            </div>
        </form>
    </div>
@endsection
