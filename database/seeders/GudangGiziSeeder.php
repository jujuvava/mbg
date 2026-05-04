<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class GudangGiziSeeder extends Seeder
{
    public function run(): void
    {
        $ingredientsData = [
            // Sumber: Gabungan Gambar 1, 2, 3, & 4
            ['name' => 'BERAS', 'energy' => 180, 'protein' => 3, 'fat' => 0.3, 'carbohydrate' => 39.8, 'iron' => 0.4, 'sodium' => 1, 'fiber' => 0.2, 'calcium' => 25, 'potassium' => 38, 'price' => 15000],
            ['name' => 'DAGING SAPI', 'energy' => 273, 'protein' => 17.5, 'fat' => 22, 'carbohydrate' => 0, 'iron' => 2.6, 'sodium' => 93, 'fiber' => 0, 'calcium' => 10, 'potassium' => 267, 'price' => 135000],
            ['name' => 'TAHU', 'energy' => 80, 'protein' => 10.9, 'fat' => 4.7, 'carbohydrate' => 0.8, 'iron' => 3.4, 'sodium' => 2, 'fiber' => 0.1, 'calcium' => 223, 'potassium' => 50.6, 'price' => 12000],
            ['name' => 'TELUR', 'energy' => 154, 'protein' => 12.4, 'fat' => 10.8, 'carbohydrate' => 0.7, 'iron' => 3, 'sodium' => 142, 'fiber' => 0, 'calcium' => 86, 'potassium' => 118.5, 'price' => 28000],
            ['name' => 'KACANG PANJANG', 'energy' => 31, 'protein' => 2.3, 'fat' => 0.1, 'carbohydrate' => 5.3, 'iron' => 0.6, 'sodium' => 30, 'fiber' => 2.7, 'calcium' => 60, 'potassium' => 213, 'price' => 15000],
            ['name' => 'KOL', 'energy' => 147, 'protein' => 5.1, 'fat' => 0.7, 'carbohydrate' => 31.5, 'iron' => 0.5, 'sodium' => 28, 'fiber' => 1.3, 'calcium' => 46, 'potassium' => 236.8, 'price' => 9000],
            ['name' => 'PEPAYA', 'energy' => 46, 'protein' => 0.5, 'fat' => 12, 'carbohydrate' => 12.2, 'iron' => 1.7, 'sodium' => 4, 'fiber' => 1.6, 'calcium' => 23, 'potassium' => 221, 'price' => 8000],
            ['name' => 'BAWANG MERAH', 'energy' => 46, 'protein' => 1.5, 'fat' => 0.3, 'carbohydrate' => 9.2, 'iron' => 0.8, 'sodium' => 7, 'fiber' => 1.7, 'calcium' => 36, 'potassium' => 178.6, 'price' => 35000],
            ['name' => 'BAWANG PUTIH', 'energy' => 112, 'protein' => 4.5, 'fat' => 0.2, 'carbohydrate' => 23.1, 'iron' => 1, 'sodium' => 46, 'fiber' => 0.6, 'calcium' => 42, 'potassium' => 665.7, 'price' => 40000],
            ['name' => 'KEMINTING', 'energy' => 675, 'protein' => 19, 'fat' => 63, 'carbohydrate' => 8, 'iron' => 2, 'sodium' => 25, 'fiber' => 3, 'calcium' => 80, 'potassium' => 430.7, 'price' => 50000],
            ['name' => 'CABE KERITING', 'energy' => 367, 'protein' => 15.9, 'fat' => 6.2, 'carbohydrate' => 61.8, 'iron' => 2.3, 'sodium' => 25, 'fiber' => 26.9, 'calcium' => 160, 'potassium' => 181.5, 'price' => 45000],
            ['name' => 'KETUMBAR BUBUK', 'energy' => 0, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 60000],
            ['name' => 'GARAM', 'energy' => 0, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 2325, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 5000],
            ['name' => 'ROYCO SAPI', 'energy' => 51, 'protein' => 1.35, 'fat' => 0.25, 'carbohydrate' => 10.92, 'iron' => 0, 'sodium' => 2733, 'fiber' => 0.3, 'calcium' => 0, 'potassium' => 54, 'price' => 48000],
            ['name' => 'KECAP', 'energy' => 71, 'protein' => 5.7, 'fat' => 1.3, 'carbohydrate' => 9, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 22000],
            ['name' => 'LADA BUBUK', 'energy' => 0, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 80000],
            ['name' => 'TEPUNG MAIZENA', 'energy' => 341, 'protein' => 0.3, 'fat' => 0, 'carbohydrate' => 85, 'iron' => 1.5, 'sodium' => 6, 'fiber' => 7, 'calcium' => 20, 'potassium' => 9, 'price' => 18000],
            ['name' => 'TEPUNG TERIGU', 'energy' => 333, 'protein' => 9, 'fat' => 1, 'carbohydrate' => 77.2, 'iron' => 6.3, 'sodium' => 2, 'fiber' => 0.3, 'calcium' => 22, 'potassium' => 0, 'price' => 13000],
            ['name' => 'KUNYIT BUBUK', 'energy' => 0, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 70000],
            ['name' => 'SANTAN', 'energy' => 324, 'protein' => 4.2, 'fat' => 34.3, 'carbohydrate' => 5.6, 'iron' => 1.9, 'sodium' => 18, 'fiber' => 0, 'calcium' => 14, 'potassium' => 514.1, 'price' => 25000],
            ['name' => 'MINYAK GORENG', 'energy' => 884, 'protein' => 0, 'fat' => 100, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 18000],
            ['name' => 'BAKSO AYAM', 'energy' => 161, 'protein' => 19.3, 'fat' => 5.62, 'carbohydrate' => 6.94, 'iron' => 0, 'sodium' => 0, 'fiber' => 0.5, 'calcium' => 0, 'potassium' => 0, 'price' => 45000],
            ['name' => 'TEMPE', 'energy' => 201, 'protein' => 20.8, 'fat' => 8.8, 'carbohydrate' => 13.5, 'iron' => 4, 'sodium' => 9, 'fiber' => 1.4, 'calcium' => 155, 'potassium' => 234, 'price' => 12000],
            ['name' => 'LABU SIAM', 'energy' => 30, 'protein' => 0.6, 'fat' => 0.1, 'carbohydrate' => 6.7, 'iron' => 0.5, 'sodium' => 3, 'fiber' => 6.2, 'calcium' => 14, 'potassium' => 167.1, 'price' => 7000],
            ['name' => 'JAGUNG', 'energy' => 147, 'protein' => 5.1, 'fat' => 0.7, 'carbohydrate' => 31.5, 'iron' => 0, 'sodium' => 0, 'fiber' => 1.3, 'calcium' => 0, 'potassium' => 0, 'price' => 10000],
            ['name' => 'JERUK', 'energy' => 77, 'protein' => 0.4, 'fat' => 0, 'carbohydrate' => 20.9, 'iron' => 4.2, 'sodium' => 0, 'fiber' => 0, 'calcium' => 28, 'potassium' => 0, 'price' => 20000],
            ['name' => 'BAWANG BOMBAY', 'energy' => 43, 'protein' => 1.4, 'fat' => 0.2, 'carbohydrate' => 10.3, 'iron' => 0.5, 'sodium' => 12, 'fiber' => 2, 'calcium' => 32, 'potassium' => 9.6, 'price' => 28000],
            ['name' => 'SAOS BARBEQUE', 'energy' => 12, 'protein' => 0.28, 'fat' => 0.28, 'carbohydrate' => 2, 'iron' => 0, 'sodium' => 0, 'fiber' => 0.2, 'calcium' => 0, 'potassium' => 0, 'price' => 35000],
            ['name' => 'SAOS TIRAM', 'energy' => 80, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 1, 'iron' => 0, 'sodium' => 290, 'fiber' => 0.2, 'calcium' => 0, 'potassium' => 0, 'price' => 35000],
            ['name' => 'AYAM POTONG', 'energy' => 298, 'protein' => 18.2, 'fat' => 25, 'carbohydrate' => 0, 'iron' => 1.5, 'sodium' => 109, 'fiber' => 0, 'calcium' => 14, 'potassium' => 285.9, 'price' => 38000],
            ['name' => 'SAWI PUTIH', 'energy' => 9, 'protein' => 1, 'fat' => 0.1, 'carbohydrate' => 1.7, 'iron' => 1.1, 'sodium' => 5, 'fiber' => 0.8, 'calcium' => 56, 'potassium' => 193.1, 'price' => 12000],
            ['name' => 'PISANG', 'energy' => 117, 'protein' => 2, 'fat' => 0.3, 'carbohydrate' => 28.9, 'iron' => 0.9, 'sodium' => 31, 'fiber' => 0.4, 'calcium' => 0, 'potassium' => 529.4, 'price' => 18000],
            ['name' => 'TOMAT', 'energy' => 24, 'protein' => 2, 'fat' => 0.7, 'carbohydrate' => 3.3, 'iron' => 0.5, 'sodium' => 10, 'fiber' => 1.8, 'calcium' => 5, 'potassium' => 210, 'price' => 16000],
            ['name' => 'CABAI RAWIT', 'energy' => 36, 'protein' => 1, 'fat' => 0.3, 'carbohydrate' => 7.3, 'iron' => 0.5, 'sodium' => 23, 'fiber' => 1.4, 'calcium' => 29, 'potassium' => 272.4, 'price' => 60000],
            ['name' => 'MARINASI AYAM', 'energy' => 0, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 0, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 5000],
            ['name' => 'TEPUNG BERAS', 'energy' => 353, 'protein' => 7, 'fat' => 0.5, 'carbohydrate' => 80, 'iron' => 0.8, 'sodium' => 5, 'fiber' => 2.4, 'calcium' => 5, 'potassium' => 241, 'price' => 15000],
            ['name' => 'SERAI', 'energy' => 99, 'protein' => 1.82, 'fat' => 0.49, 'carbohydrate' => 25.31, 'iron' => 0, 'sodium' => 0, 'fiber' => 0, 'calcium' => 0, 'potassium' => 0, 'price' => 8000],
            ['name' => 'SAOS TOMAT SACHET', 'energy' => 110, 'protein' => 2, 'fat' => 0.4, 'carbohydrate' => 24.5, 'iron' => 0, 'sodium' => 0, 'fiber' => 0.9, 'calcium' => 0, 'potassium' => 0, 'price' => 25000],
            ['name' => 'NASI', 'energy' => 180, 'protein' => 3, 'fat' => 0.3, 'carbohydrate' => 39.8, 'iron' => 0.4, 'sodium' => 1, 'fiber' => 0.2, 'calcium' => 25, 'potassium' => 38, 'price' => 15000],
            ['name' => 'AYAM FILLET', 'energy' => 298, 'protein' => 18.2, 'fat' => 25, 'carbohydrate' => 0, 'iron' => 1.5, 'sodium' => 109, 'fiber' => 0, 'calcium' => 14, 'potassium' => 385.9, 'price' => 55000],
            ['name' => 'WORTEL', 'energy' => 36, 'protein' => 1, 'fat' => 0.6, 'carbohydrate' => 7.9, 'iron' => 1, 'sodium' => 70, 'fiber' => 1, 'calcium' => 45, 'potassium' => 245, 'price' => 14000],
            ['name' => 'SEMANGKA', 'energy' => 28, 'protein' => 0.5, 'fat' => 0.2, 'carbohydrate' => 6.9, 'iron' => 0.2, 'sodium' => 7, 'fiber' => 0.4, 'calcium' => 7, 'potassium' => 93.8, 'price' => 10000],
            ['name' => 'SAOS TOMAT', 'energy' => 110, 'protein' => 2, 'fat' => 0.4, 'carbohydrate' => 24.5, 'iron' => 0, 'sodium' => 0, 'fiber' => 0.9, 'calcium' => 0, 'potassium' => 0, 'price' => 20000],
            ['name' => 'SAOS SAMBAL', 'energy' => 15, 'protein' => 0, 'fat' => 0, 'carbohydrate' => 4, 'iron' => 0.8, 'sodium' => 7, 'fiber' => 0.9, 'calcium' => 36, 'potassium' => 178.6, 'price' => 25000],
        ];

        foreach ($ingredientsData as $data) {
            // updateOrCreate akan memastikan data duplikat tidak masuk dua kali berdasarkan 'name'
            Ingredient::updateOrCreate(
                ['name' => $data['name']],
                [
                    'energy'       => $data['energy'],
                    'protein'      => $data['protein'],
                    'fat'          => $data['fat'],
                    'carbohydrate' => $data['carbohydrate'],
                    'iron'         => $data['iron'] ?? 0,
                    'sodium'       => $data['sodium'] ?? 0,
                    'fiber'        => $data['fiber'] ?? 0,
                    'calcium'      => $data['calcium'] ?? 0,
                    'potassium'    => $data['potassium'] ?? 0,
                    'price_per_kg' => $data['price'],
                ]
            );
        }
    }
}
