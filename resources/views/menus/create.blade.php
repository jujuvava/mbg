@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-800">Buat Konsep Menu Baru</h2>
                <p class="text-slate-500 text-sm">Mapping bahan makanan dari gudang gizi ke dalam menu.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm">
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('menus.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Menu -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-semibold text-slate-700">Nama Menu</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                placeholder="Contoh: Nasi Goreng Gizi Seimbang"
                                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                required>
                        </div>
                        <div class="space-y-2">
                            <label for="estimated_cost" class="block text-sm font-semibold text-slate-700">Estimasi Biaya
                                (Rp)</label>
                            <input type="number" name="estimated_cost" id="estimated_cost"
                                value="{{ old('estimated_cost') }}" placeholder="0"
                                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- Mapping Bahan Makanan -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Komposisi Bahan Makanan
                    </h3>

                    <div id="ingredient-wrapper" class="space-y-3">
                        <div class="flex items-center gap-4 ingredient-row">
                            <div class="flex-1">
                                <select name="ingredients[]"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-blue-500 outline-none"
                                    required>
                                    <option value="" disabled selected>Pilih Bahan dari Gudang Gizi</option>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}
                                            ({{ $ingredient->energy }} Kkal/100g)
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-32">
                                <div class="relative">
                                    <input type="number" name="weights[]" placeholder="Berat"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-lg outline-none focus:ring-blue-500"
                                        required>
                                    <span class="absolute right-3 top-2 text-slate-400 text-sm">gr</span>
                                </div>
                            </div>
                            <button type="button" class="remove-row text-red-400 hover:text-red-600 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="button" id="add-ingredient"
                        class="mt-4 inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Bahan Lain
                    </button>
                </div>

                <!-- Catatan -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                    <label for="notes" class="block text-sm font-semibold text-slate-700 mb-2">Catatan Gizi /
                        Keterangan</label>
                    <textarea name="notes" id="notes" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 transition"
                        placeholder="Contoh: Menu ini kaya akan protein nabati.">{{ old('notes') }}</textarea>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('menus.index') }}" class="text-slate-600 hover:text-slate-800 font-medium">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-200">
                        Simpan & Hitung Kalori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('ingredient-wrapper');
            const addButton = document.getElementById('add-ingredient');

            // Fungsi menambah baris bahan
            addButton.addEventListener('click', function() {
                const firstRow = wrapper.querySelector('.ingredient-row');
                const newRow = firstRow.cloneNode(true);

                // Reset input di baris baru
                newRow.querySelectorAll('input').forEach(input => input.value = '');
                newRow.querySelector('select').selectedIndex = 0;

                wrapper.appendChild(newRow);
            });

            // Fungsi menghapus baris bahan
            wrapper.addEventListener('click', function(e) {
                if (e.target.closest('.remove-row')) {
                    const rows = wrapper.querySelectorAll('.ingredient-row');
                    if (rows.length > 1) {
                        e.target.closest('.ingredient-row').remove();
                    } else {
                        alert('Minimal harus ada satu bahan makanan.');
                    }
                }
            });
        });
    </script>
@endsection
