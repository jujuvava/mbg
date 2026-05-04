<!-- Sidebar Navigation -->
<nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-30 flex flex-col w-64 h-screen text-gray-300 transition duration-300 transform border-r bg-slate-900 lg:translate-x-0 lg:static lg:inset-0 border-slate-700">
    <!-- Logo / Brand -->
    <div class="flex items-center justify-center px-6 mt-8">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-blue-600 rounded-lg shadow-lg shadow-blue-500/20">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-tight text-white">GiziGratis<span
                    class="text-blue-500">ID</span></span>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 px-4 mt-10 overflow-y-auto">
        <div class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">🏠</span>
                <span class="text-sm font-medium">Dashboard</span>
            </a>

            <!-- Heading: Stok -->
            <div class="pt-6 pb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">
                Logistik & Stok
            </div>

            <!-- Gudang Gizi -->
            <a href="{{ route('ingredients.index') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('ingredients.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">📦</span>
                <span class="text-sm font-medium">Gudang Gizi</span>
            </a>

            <!-- Pengadaan -->
            <a href="{{ route('purchases.index') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('purchases.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">🛒</span>
                <span class="text-sm font-medium">Pengadaan Barang</span>
            </a>

            <!-- Heading: Operasional -->
            <div class="pt-6 pb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">
                Produksi & Distribusi
            </div>

            <!-- Daftar Menu -->
            <a href="{{ route('menus.index') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('menus.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">🍱</span>
                <span class="text-sm font-medium">Daftar Menu</span>
            </a>

            <!-- Proses Distribusi -->
            <a href="{{ route('distribusi.index') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('distribusi.index') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">🚚</span>
                <span class="text-sm font-medium">Proses Distribusi</span>
            </a>

            <!-- Laporan Distribusi -->
            <a href="{{ route('distribusi.history') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition-all duration-200 {{ request()->routeIs('distribusi.history') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 hover:text-white' }}">
                <span class="text-lg">📊</span>
                <span class="text-sm font-medium">Laporan Distribusi</span>
            </a>
        </div>
    </div>

    <!-- Bottom Section: User Info & Logout -->
    <div class="p-4 border-t border-slate-800 bg-slate-900/50">
        <div class="flex items-center p-2 mb-4">
            <div
                class="flex items-center justify-center w-8 h-8 text-xs font-bold text-blue-400 border rounded-full bg-slate-700 border-slate-600">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="ml-3">
                <p class="text-xs font-semibold leading-none text-white">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-slate-500 mt-1">Administrator</p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full p-2 space-x-3 transition duration-200 rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-400/10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="text-xs font-medium">Keluar Aplikasi</span>
            </button>
        </form>
    </div>
</nav>
