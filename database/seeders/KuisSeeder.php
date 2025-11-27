<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;

class KuisSeeder extends Seeder
{
    public function run(): void
    {
        // Anggap Modul 1 adalah ID 1
        $idModulVokal = 1; 

        Pertanyaan::create([
            'id_modul' => $idModulVokal,
            'soal' => 'Manakah huruf yang memiliki pelafalan "a"?',
            'a' => 'ㅏ',
            'b' => 'ㅗ',
            'c' => 'ㅜ',
            'd' => 'ㅣ',
            'jawaban' => 'a', // Kunci jawaban
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulVokal,
            'soal' => 'Huruf "ㅜ" dibaca sebagai...',
            'a' => 'a',
            'b' => 'i',
            'c' => 'u',
            'd' => 'o',
            'jawaban' => 'c',
            'bobot' => 20,
        ]);
    }
}