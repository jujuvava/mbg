<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSatuSeeder extends Seeder
{
    /**
     * Jalankan seeder menu berdasarkan data gambar b8b07b, b8b03f, dan b8b020.
     */
    public function run(): void
    {
        // Definisi 3 Menu Lengkap
        $menus = [
            [
                'name' => 'Menu 1 (Daging Sapi)',
                'notes' => 'Menu berbasis daging sapi dengan sayuran kacang panjang dan kol.',
                'items' => [
                    'BERAS' => 100,
                    'DAGING SAPI' => 37,
                    'TAHU' => 25,
                    'TELUR' => 0.8,
                    'KACANG PANJANG' => 30,
                    'KOL' => 25,
                    'PEPAYA' => 50,
                    'BAWANG MERAH' => 1.5,
                    'BAWANG PUTIH' => 1.5,
                    'KEMINTING' => 0.2,
                    'CABE KERITING' => 0.8,
                    'KETUMBAR BUBUK' => 0.1,
                    'GARAM' => 0.8,
                    'ROYCO SAPI' => 0.5,
                    'KECAP' => 2,
                    'LADA BUBUK' => 0.1,
                    'TEPUNG MAIZENA' => 1,
                    'TEPUNG TERIGU' => 5,
                    'KUNYIT BUBUK' => 0.2,
                    'SANTAN' => 4,
                    'MINYAK GORENG' => 5.5,
                ]
            ],
            [
                'name' => 'Menu 2 (Bakso Ayam)',
                'notes' => 'Menu sehat dengan bakso ayam, labu siam, dan jagung.',
                'items' => [
                    'BERAS' => 100,
                    'BAKSO AYAM' => 60,
                    'TEMPE' => 25,
                    'TELUR' => 2,
                    'LABU SIAM' => 40,
                    'JAGUNG' => 30,
                    'JERUK' => 60,
                    'BAWANG MERAH' => 2,
                    'BAWANG PUTIH' => 2,
                    'BAWANG BOMBAY' => 1,
                    'TEPUNG TERIGU' => 5,
                    'TEPUNG MAIZENA' => 5,
                    'SAOS BARBEQUE' => 5,
                    'SAOS TIRAM' => 3,
                    'KECAP' => 2,
                    'GARAM' => 0.8,
                    'ROYCO SAPI' => 0.6,
                    'LADA BUBUK' => 0.1,
                    'MINYAK GORENG' => 6,
                ]
            ],
            [
                'name' => 'Menu 3 (Ayam Potong)',
                'notes' => 'Menu ayam potong dengan sawi putih dan buah pisang.',
                'items' => [
                    'BERAS' => 100,
                    'AYAM POTONG' => 60,
                    'TELUR' => 1,
                    'TAHU' => 25,
                    'KACANG PANJANG' => 20,
                    'SAWI PUTIH' => 15,
                    'PISANG' => 60,
                    'BAWANG MERAH' => 2,
                    'BAWANG PUTIH' => 2,
                    'TOMAT' => 0.8,
                    'CABAI RAWIT' => 0.5,
                    'MARINASI AYAM' => 0.8,
                    'TEPUNG BERAS' => 3,
                    'TEPUNG MAIZENA' => 1,
                    'SANTAN' => 3,
                    'SERAI' => 0.5,
                    'GARAM' => 0.5,
                    'ROYCO SAPI' => 0.5,
                    'LADA BUBUK' => 0.1,
                    'SAOS TOMAT SACHET' => 0.1,
                    'MINYAK GORENG' => 7,
                ]
            ],
        ];

        foreach ($menus as $menuData) {
            DB::transaction(function () use ($menuData) {
                // Buat atau update data dasar menu
                $menu = Menu::updateOrCreate(
                    ['name' => $menuData['name']],
                    ['notes' => $menuData['notes']]
                );

                $totalCalories = 0;
                $totalCost = 0;
                $pivotData = [];

                // Proses setiap bahan pangan untuk kalkulasi otomatis
                foreach ($menuData['items'] as $name => $weight) {
                    $ingredient = Ingredient::whereName($name)->first();

                    if ($ingredient) {
                        // Kalkulasi Kalori: (Energi per 100g / 100) * Berat Bersih (gram)
                        $totalCalories += ($ingredient->energy / 100) * $weight;

                        // Kalkulasi Biaya: (Harga per Kg / 1000) * Berat Bersih (gram)
                        $totalCost += ($ingredient->price_per_kg / 1000) * $weight;

                        $pivotData[$ingredient->id] = ['weight_gram' => $weight];
                    }
                }

                // Sinkronisasi ke tabel pivot menu_ingredient
                $menu->ingredients()->sync($pivotData);

                // Update hasil perhitungan akhir ke tabel menus
                $menu->update([
                    'calories' => $totalCalories,
                    'estimated_cost' => $totalCost,
                ]);
            });
        }
    }
}
