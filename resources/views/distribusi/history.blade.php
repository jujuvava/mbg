@extends('layouts.app')

@section('content')
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Laporan Distribusi Makanan</h2>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tanggal & Waktu</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Menu</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Total Porsi</th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Estimasi Biaya</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($logs as $log)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $log->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-blue-600">{{ $log->menu->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $log->total_porsi }} Porsi</td>
                            <td class="px-6 py-4 text-sm text-right text-gray-900">Rp
                                {{ number_format($log->total_estimated_cost, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
