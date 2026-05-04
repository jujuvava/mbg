@extends('layouts.app')

@section('content')
    <div class="max-w-2xl p-8 py-10 mx-auto bg-white rounded-lg shadow-sm">
        <h2 class="mb-6 text-2xl font-bold">Update Stok: {{ $ingredient->name }}</h2>

        <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700">Stok Saat Ini (Kg)</label>
                <input type="number" name="stock_kg" step="0.01" value="{{ $ingredient->inventory->stock_kg ?? 0 }}"
                    class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-bold text-gray-700">Batas Stok Minimum (Kg)</label>
                <input type="number" name="min_stock_kg" step="0.01"
                    value="{{ $ingredient->inventory->min_stock_kg ?? 5 }}" class="w-full px-3 py-2 border rounded"
                    required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('ingredients.index') }}" class="py-2 text-gray-600">Batal</a>
                <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
