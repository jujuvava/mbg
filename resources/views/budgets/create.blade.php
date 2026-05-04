<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Tambah Sumber Anggaran</h2>
            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700">Kembali</a>
        </div>

        <form action="{{ route('budgets.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700">Nama Sumber Dana</label>
                <input type="text" name="source_name" class="mt-1 block w-full rounded-md border-slate-300 border p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Misal: Hibah Pusat 2026 atau APBD Ketapang">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Total Nominal (Rp)</label>
                <input type="number" name="amount" class="mt-1 block w-full rounded-md border-slate-300 border p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="mt-1 block w-full rounded-md border-slate-300 border p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Tanggal Berakhir</label>
                    <input type="date" name="end_date" class="mt-1 block w-full rounded-md border-slate-300 border p-2">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Keterangan Tambahan</label>
                <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border-slate-300 border p-2" placeholder="Catatan mengenai alokasi dana..."></textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition font-bold shadow-md">
                    Simpan Anggaran
                </button>
            </div>
        </form>
    </div>
</body>
</html>