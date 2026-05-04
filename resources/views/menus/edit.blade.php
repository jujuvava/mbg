<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Menu: ') }} {{ $menu->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <!-- Info Estimasi Biaya Saat Ini -->
                <div
                    class="flex items-center justify-between p-4 mb-8 border rounded-lg bg-emerald-50 border-emerald-200">
                    <div>
                        <p class="text-sm font-medium text-emerald-700">Estimasi Biaya Terdaftar</p>
                        <p class="text-2xl font-bold text-emerald-600">Rp
                            {{ number_format($menu->estimated_cost, 0, ',', '.') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-blue-700">Total Kalori</p>
                        <p class="text-2xl font-bold text-blue-600">{{ number_format($menu->calories, 0) }} kkal</p>
                    </div>
                </div>

                <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Menu -->
                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Nama Menu')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            :value="old('name', $menu->name)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Catatan -->
                    <div class="mb-6">
                        <x-input-label for="notes" :value="__('Catatan / Prosedur Masak')" />
                        <textarea name="notes"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="3">{{ old('notes', $menu->notes) }}</textarea>
                    </div>

                    <!-- Komposisi Bahan (Gudang Gizi) -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Komposisi Bahan</h3>
                            <button type="button" onclick="addIngredient()"
                                class="px-3 py-1 text-sm text-white bg-gray-800 rounded hover:bg-gray-700">
                                + Tambah Baris Bahan
                            </button>
                        </div>

                        <div id="ingredient-container" class="space-y-3">
                            @foreach ($menu->ingredients as $index => $currentIngredient)
                                <div class="flex items-center space-x-4 ingredient-row">
                                    <div class="flex-1">
                                        <select name="ingredients[]"
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500">
                                            @foreach ($ingredients as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $currentIngredient->id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }} (Rp
                                                    {{ number_format($item->price_per_kg, 0) }}/kg)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-32">
                                        <input type="number" step="0.1" name="weights[]"
                                            value="{{ $currentIngredient->pivot->weight_gram }}" placeholder="Gram"
                                            class="block w-full border-gray-300 rounded-md shadow-sm" required>
                                    </div>
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="font-bold text-red-500 hover:text-red-700">✕</button>
                                </div>
                            @endforeach
                        </div>
                        <p class="mt-2 text-xs italic text-gray-500">*Biaya akan dihitung ulang secara otomatis
                            berdasarkan harga terbaru di Gudang Gizi saat Anda menyimpan perubahan.</p>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-6">
                        <a href="{{ route('menus.index') }}" class="text-sm text-gray-600 hover:underline">Batal</a>
                        <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk Tambah Baris Bahan Secara Dinamis -->
    <script>
        function addIngredient() {
            const container = document.getElementById('ingredient-container');
            const row = document.querySelector('.ingredient-row').cloneNode(true);
            row.querySelector('input').value = '';
            container.appendChild(row);
        }
    </script>
</x-app-layout>
