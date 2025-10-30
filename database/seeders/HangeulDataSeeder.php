<?php

namespace Database\Seeders;
use App\Models\Jamo;
use Illuminate\Database\Seeder;

class HangeulDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT JAMO (Konsonan dan Vokal)
        $g = Jamo::create(['hangeul' => 'ㄱ', 'pelafalan' => 'g/k', 'jenis' => 'konsonan']);
        $n = Jamo::create(['hangeul' => 'ㄴ', 'pelafalan' => 'n', 'jenis' => 'konsonan']);
        $a = Jamo::create(['hangeul' => 'ㅏ', 'pelafalan' => 'a', 'jenis' => 'vokal']);
        $eo = Jamo::create(['hangeul' => 'ㅓ', 'pelafalan' => 'eo', 'jenis' => 'vokal']);

        // 2. ISI CONTOH KATA MENGGUNAKAN RELASI
        $g->contohKata()->createMany([
            ['kata_hangeul' => '가방', 'arti_indonesia' => 'tas'],
            ['kata_hangeul' => '고기', 'arti_indonesia' => 'daging'],
        ]);
        
        $n->contohKata()->createMany([
            ['kata_hangeul' => '나비', 'arti_indonesia' => 'kupu-kupu'],
            ['kata_hangeul' => '누나', 'arti_indonesia' => 'kakak perempuan'],
        ]);
        
    }
}