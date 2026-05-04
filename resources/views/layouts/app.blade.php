<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GiziGratisID') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <!-- Wrapper Utama dengan Flexbox -->
    <div class="flex h-screen overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }">

        <!-- SIDEBAR (Navigation) -->
        <!-- Menyesuaikan dengan file navigation.blade.php yang kita buat sebelumnya -->
        @include('layouts.navigation')

        <!-- AREA KONTEN UTAMA -->
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">

            <!-- TOP BAR (Hanya muncul di Mobile untuk Toggle Sidebar) -->
            <header class="flex items-center justify-between flex-shrink-0 p-4 bg-white shadow-sm lg:hidden">
                <div class="flex items-center">
                    <span class="text-lg font-bold text-slate-800">GiziGratisID</span>
                </div>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 text-gray-600 rounded-md hover:bg-gray-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-8">
                    <!-- Container untuk konten agar tidak mepet ke pinggir -->
                    <div class="max-w-full px-4 mx-auto sm:px-6 lg:px-8">

                        <!-- Alert Notifikasi Global (Opsional) -->
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

                        <!-- Slot Konten dari View -->
                        @yield('content')

                        {{-- Jika Anda menggunakan Laravel Breeze (Starter Kit), gunakan $slot --}}
                        @if (isset($slot))
                            {{ $slot }}
                        @endif
                    </div>
                </div>
            </main>
        </div>

        <!-- Mobile Overlay (Menutup sidebar saat klik di luar area pada mobile) -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        </div>
    </div>

    <!-- Script tambahan jika diperlukan -->
    @stack('scripts')
</body>

</html>
