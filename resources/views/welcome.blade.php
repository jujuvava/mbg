<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GiziGratisID - Sistem Manajemen Logistik</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-slate-50">
    <div class="relative flex flex-col items-center justify-center min-h-screen overflow-hidden">

        <!-- Background Decoration -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
            <div
                class="absolute bg-blue-100 rounded-full -top-24 -left-24 w-96 h-96 mix-blend-multiply filter blur-3xl opacity-70">
            </div>
            <div
                class="absolute bg-green-100 rounded-full top-1/2 -right-24 w-80 h-80 mix-blend-multiply filter blur-3xl opacity-70">
            </div>
        </div>

        <div class="w-full max-w-4xl px-6 text-center">
            <!-- Logo Section -->
            <div class="flex justify-center mb-8">
                <div class="p-4 bg-blue-600 shadow-2xl rounded-2xl shadow-blue-500/40">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Hero Text -->
            <h1 class="mb-4 text-5xl font-extrabold tracking-tight text-slate-900">
                GiziGratis<span class="text-blue-600">ID</span>
            </h1>
            <p class="max-w-2xl mx-auto mb-10 text-xl leading-relaxed text-slate-600">
                Sistem Manajemen Logistik Terpadu untuk Program Makan Gizi Gratis.
                Pantau stok gudang, kelola pengadaan, dan laporan distribusi dalam satu dashboard.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col items-center justify-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="w-full px-8 py-4 font-bold text-white transition transform shadow-xl sm:w-auto bg-slate-900 rounded-xl hover:bg-slate-800 hover:-translate-y-1">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="w-full px-8 py-4 font-bold text-white transition transform bg-blue-600 shadow-xl sm:w-auto rounded-xl shadow-blue-600/30 hover:bg-blue-700 hover:-translate-y-1">
                            Masuk ke Sistem
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="w-full px-8 py-4 font-bold transition bg-white border shadow-sm sm:w-auto text-slate-700 rounded-xl border-slate-200 hover:bg-slate-50">
                                Daftar Akun Petugas
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 gap-8 mt-20 text-left md:grid-cols-3">
                <div class="p-6 bg-white border shadow-sm rounded-2xl border-slate-100">
                    <div class="mb-4 text-2xl text-blue-600">📦</div>
                    <h3 class="mb-2 font-bold text-slate-900">Manajemen Stok</h3>
                    <p class="text-sm text-slate-500">Pantau ketersediaan bahan pangan di gudang gizi secara real-time.
                    </p>
                </div>
                <div class="p-6 bg-white border shadow-sm rounded-2xl border-slate-100">
                    <div class="mb-4 text-2xl text-green-600">🛒</div>
                    <h3 class="mb-2 font-bold text-slate-900">Pengadaan Efisien</h3>
                    <p class="text-sm text-slate-500">Catat setiap pembelian ke produsen untuk transparansi anggaran.
                    </p>
                </div>
                <div class="p-6 bg-white border shadow-sm rounded-2xl border-slate-100">
                    <div class="mb-4 text-2xl text-orange-600">🚚</div>
                    <h3 class="mb-2 font-bold text-slate-900">Laporan Distribusi</h3>
                    <p class="text-sm text-slate-500">Rekapitulasi otomatis setiap makanan yang disalurkan ke
                        masyarakat.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-20 text-sm italic text-slate-400">
            &copy; {{ date('Y') }} GiziGratisID - Monitoring Logistik Ketapang
        </footer>
    </div>
</body>

</html>
