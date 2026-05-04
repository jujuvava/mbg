@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">Distribusi Makan Gizi Gratis</h2>

                    <!-- Notifikasi Sukses/Error -->
                    @if (session('success'))
                        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('distribusi.store') }}" method="POST" class="max-w-xl">
                        @csrf

                        <!-- Pilih Menu -->
                        <div class="mb-5">
                            <label for="menu_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih Menu Hari
                                Ini</label>
                            <select id="menu_id" name="menu_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}
                                        ({{ number_format($menu->calories, 0) }} kkal)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Jumlah Porsi -->
                        <div class="mb-6">
                            <label for="total_porsi" class="block mb-2 text-sm font-medium text-gray-900">Total Porsi
                                Distribusi</label>
                            <input type="number" id="total_porsi" name="total_porsi" placeholder="Contoh: 500"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            <p class="mt-2 text-sm italic text-gray-500">*Stok bahan di gudang akan otomatis terpotong
                                sesuai porsi.</p>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition duration-200"
                            onclick="return confirm('Proses distribusi sekarang? Stok bahan di Gudang Gizi akan berkurang.')">
                            Konfirmasi & Potong Stok
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
