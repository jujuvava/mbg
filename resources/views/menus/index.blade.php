<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manajemen Menu Makanan') }}
            </h2>
            <a href="{{ route('menus.create') }}"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700">
                + Tambah Menu Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Alert Success -->
            @if (session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Menu</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-center text-gray-600">Total Kalori
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold text-right text-gray-600">Estimasi Biaya
                                    </th>
                                    <th class="px-6 py-4 text-sm font-semibold text-center text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($menus as $menu)
                                    <tr class="transition duration-150 hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $menu->name }}</div>
                                            @if ($menu->notes)
                                                <div class="text-xs text-gray-500">{{ Str::limit($menu->notes, 50) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ number_format($menu->calories, 0) }} kkal
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-right text-emerald-600">
                                            Rp {{ number_format($menu->estimated_cost, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center space-x-3">
                                                <a href="{{ route('menus.edit', $menu->id) }}"
                                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-900">Edit</a>

                                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-sm font-medium text-red-600 hover:text-red-900">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 italic text-center text-gray-500">
                                            Belum ada menu yang dibuat. Silakan tambahkan menu pertama Anda.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
