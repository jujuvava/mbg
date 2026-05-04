<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Default (Akun Junaidi)
        User::updateOrCreate(
            ['email' => 'junaidi@example.com'],
            [
                'name' => 'Junaidi',
                'password' => Hash::make('password'), // Silakan ganti sesuai kebutuhan
                'email_verified_at' => now(),
            ]
        );

        // 2. Panggil Seeder Gudang Gizi & Menu
        $this->call([
            GudangGiziSeeder::class, // Mengisi data master bahan pangan
            InventorySeeder::class,  // Mengisi stok awal untuk bahan tersebut
            MenuSatuSeeder::class,   // Memuat komposisi Menu 1
        ]);
    }
}
