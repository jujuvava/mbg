<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Bahan ke Gudang Gizi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('ingredients.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Bahan -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Nama Bahan (Contoh: Beras)</label>
                            <input type="text" name="name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Data Nutrisi per 100g -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Energi (kkal)</label>
                            <input type="number" step="0.01" name="energy" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Protein (g)</label>
                            <input type="number" step="0.01" name="protein" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lemak (g)</label>
                            <input type="number" step="0.01" name="fat" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Karbohidrat (g)</label>
                            <input type="number" step="0.01" name="carbohydrate" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Harga untuk Laporan Pengeluaran -->
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Harga per Kilogram (Rp)</label>
                            <input type="number" name="price_per_kg" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Simpan Bahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
