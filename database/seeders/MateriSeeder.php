<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenis;
use App\Models\Modul;
use App\Models\Jamo;
use App\Models\Kata;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Jenis (Kategori)
        $jenisVokal = Jenis::create(['nama_jenis' => 'Vokal Dasar']);
        $jenisKonsonan = Jenis::create(['nama_jenis' => 'Konsonan Dasar']);

        // 2. Buat Modul (Terkait dengan Jenis)
        Modul::create([
            'id_jenis' => $jenisVokal->id_jenis,
            'nama_modul' => 'Modul 1: Mengenal Vokal Dasar',
        ]);

        Modul::create([
            'id_jenis' => $jenisKonsonan->id_jenis,
            'nama_modul' => 'Modul 2: Mengenal Konsonan Dasar',
        ]);

        // 3. Buat Data Jamo (Huruf Hangeul)
        // Vokal
        Jamo::create(['hangeul' => 'ㅏ', 'pelafalan' => 'a', 'id_jenis' => $jenisVokal->id_jenis]);
        Jamo::create(['hangeul' => 'ㅣ', 'pelafalan' => 'i', 'id_jenis' => $jenisVokal->id_jenis]);
        Jamo::create(['hangeul' => 'ㅜ', 'pelafalan' => 'u', 'id_jenis' => $jenisVokal->id_jenis]);
        
        // Konsonan
        $giyok = Jamo::create(['hangeul' => 'ㄱ', 'pelafalan' => 'g/k', 'id_jenis' => $jenisKonsonan->id_jenis]);
        $nieun = Jamo::create(['hangeul' => 'ㄴ', 'pelafalan' => 'n', 'id_jenis' => $jenisKonsonan->id_jenis]);

        // 4. Buat Kata (Contoh)
        $kata1 = Kata::create(['hangeul' => '누나', 'arti' => 'Kakak Perempuan (bagi laki-laki)']); // Nuna
        
        // 5. Hubungkan Jamo ke Kata (Pivot Table)
        // Kata 'Nuna' (누나) terdiri dari ㄴ (nieun). Kita hubungkan.
        $kata1->hangeul()->attach($nieun->id_jamo);
    }
}