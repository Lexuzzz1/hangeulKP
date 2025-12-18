<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;

class KuisSeeder extends Seeder
{
    public function run(): void
    {
        // ========== MODUL 1: VOKAL DASAR ==========
        $idModulVokal = 1;

        Pertanyaan::create([
            'id_modul' => $idModulVokal,
            'soal' => 'Manakah huruf yang memiliki pelafalan "a"?',
            'a' => 'ㅏ',
            'b' => 'ㅗ',
            'c' => 'ㅜ',
            'd' => 'ㅣ',
            'jawaban' => 'a',
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

        // ========== MODUL 2: KONSONAN DASAR ==========
        $idModulKonsonan = 2;

        Pertanyaan::create([
            'id_modul' => $idModulKonsonan,
            'soal' => 'Huruf konsonan "ㄱ" dibaca sebagai...',
            'a' => 'g/k',
            'b' => 'n',
            'c' => 'p',
            'd' => 'd',
            'jawaban' => 'a',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulKonsonan,
            'soal' => 'Konsonan "ㄴ" memiliki pelafalan...',
            'a' => 'g',
            'b' => 'n',
            'c' => 'm',
            'd' => 'l',
            'jawaban' => 'b',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulKonsonan,
            'soal' => 'Manakah huruf konsonan yang benar untuk "m"?',
            'a' => 'ㄱ',
            'b' => 'ㄴ',
            'c' => 'ㅁ',
            'd' => 'ㅂ',
            'jawaban' => 'c',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulKonsonan,
            'soal' => 'Huruf "ㅂ" dibaca sebagai...',
            'a' => 'b/p',
            'b' => 'd',
            'c' => 'l',
            'd' => 'r',
            'jawaban' => 'a',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulKonsonan,
            'soal' => 'Konsonan "ㄹ" memiliki pelafalan...',
            'a' => 'n',
            'b' => 'l/r',
            'c' => 'm',
            'd' => 'g',
            'jawaban' => 'b',
            'bobot' => 20,
        ]);

        // ========== MODUL 3: GABUNGAN HURUF ==========
        $idModulGabungan = 3;

        Pertanyaan::create([
            'id_modul' => $idModulGabungan,
            'soal' => 'Bacakan: "가"',
            'a' => 'na',
            'b' => 'ga',
            'c' => 'ba',
            'd' => 'ma',
            'jawaban' => 'b',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulGabungan,
            'soal' => 'Bacakan: "나"',
            'a' => 'na',
            'b' => 'ga',
            'c' => 'ba',
            'd' => 'da',
            'jawaban' => 'a',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulGabungan,
            'soal' => 'Bacakan: "마"',
            'a' => 'na',
            'b' => 'ga',
            'c' => 'ma',
            'd' => 'ba',
            'jawaban' => 'c',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulGabungan,
            'soal' => 'Bacakan: "다"',
            'a' => 'na',
            'b' => 'da',
            'c' => 'ba',
            'd' => 'ga',
            'jawaban' => 'b',
            'bobot' => 20,
        ]);

        Pertanyaan::create([
            'id_modul' => $idModulGabungan,
            'soal' => 'Bacakan: "라"',
            'a' => 'ra',
            'b' => 'na',
            'c' => 'ga',
            'd' => 'ba',
            'jawaban' => 'a',
            'bobot' => 20,
        ]);
    }
}