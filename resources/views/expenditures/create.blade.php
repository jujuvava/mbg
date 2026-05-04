<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Pengeluaran - Makan Bergizi Gratis</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 min-h-screen p-4 md:p-12">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Input Pengeluaran Harian</h1>
                <p class="text-slate-500 text-sm">Catat distribusi makanan dan dokumentasi kegiatan.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition">
                &larr; Kembali ke Dashboard
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
            <form action="{{ route('expenditures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Sumber Anggaran</label>
                        <select name="budget_id" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-slate-50">
                            <option value="" disabled selected>Pilih Anggaran...</option>
                            @foreach($budgets as $budget)
                                <option value="{{ $budget->id }}">
                                    {{ $budget->source_name }} (Sisa: Rp {{ number_format($budget->amount - $budget->expenditures_sum_total_cost ?? 0) }})
                                </option>
                            @endforeach
                        </select>
                        @error('budget_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Menu Makanan</label>
                        <select name="menu_id" id="menu_id" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none bg-slate-50">
                            <option value="" disabled selected>Pilih Menu...</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" data-cost="{{ $menu->estimated_cost }}">
                                    {{ $menu->name }} (Estimasi: Rp {{ number_format($menu->estimated_cost) }})
                                </option>
                            @endforeach
                        </select>
                        @error('menu_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jumlah Porsi (Anak)</label>
                        <input type="number" id="portion_count" name="portion_count" min="1" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="0">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Biaya Riil per Porsi</label>
                        <input type="number" id="cost_per_portion" name="cost_per_portion" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Rp 0">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Distribusi</label>
                    <input type="text" name="location" class="w-full rounded-lg border-slate-300 border p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Misal: SDN 05 Ketapang Selatan">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Foto Dokumentasi & Bukti</label>
                    <div class="mt-1 flex items-center justify-center w-full">
                        <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50 hover:border-blue-300 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="mb-2 text-sm text-slate-500 font-medium">Klik untuk upload foto kegiatan</p>
                                <p class="text-xs text-slate-400">JPG, PNG (Max 2MB)</p>
                            </div>
                            <input type="file" name="photo" id="photo_input" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    <div id="photo_preview_container" class="mt-4 hidden text-center">
                        <p class="text-xs text-slate-500 mb-2 uppercase font-bold">Preview Foto:</p>
                        <img id="photo_preview" src="#" alt="Preview" class="mx-auto h-32 rounded-lg shadow-sm border border-slate-200">
                    </div>
                </div>

                <div class="bg-blue-600 p-5 rounded-xl text-white flex justify-between items-center shadow-lg shadow-blue-200">
                    <span class="font-medium opacity-90">Estimasi Total Pengeluaran:</span>
                    <span id="display_total" class="text-3xl font-bold">Rp 0</span>
                </div>

                <button type="submit" class="w-full bg-slate-800 text-white py-4 rounded-xl hover:bg-slate-900 transition font-bold text-lg shadow-md">
                    Simpan & Catat Transaksi
                </button>
            </form>
        </div>
    </div>

    <script>
        const portionInput = document.getElementById('portion_count');
        const costInput = document.getElementById('cost_per_portion');
        const displayTotal = document.getElementById('display_total');
        const menuSelect = document.getElementById('menu_id');
        const photoInput = document.getElementById('photo_input');
        const photoPreview = document.getElementById('photo_preview');
        const previewContainer = document.getElementById('photo_preview_container');

        // Fungsi hitung total otomatis
        function calculate() {
            const total = (portionInput.value || 0) * (costInput.value || 0);
            displayTotal.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
        }

        // Set biaya otomatis saat menu dipilih
        menuSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const cost = selectedOption.getAttribute('data-cost');
            costInput.value = cost;
            calculate();
        });

        portionInput.addEventListener('input', calculate);
        costInput.addEventListener('input', calculate);

        // Preview Foto sebelum upload
        photoInput.onchange = evt => {
            const [file] = photoInput.files;
            if (file) {
                photoPreview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>