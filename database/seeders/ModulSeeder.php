<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenis;
use App\Models\Modul;
use App\Models\Jamo;
use App\Models\Kata;



class ModulSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. BUAT 3 JENIS (KATEGORI) UTAMA
        // ==========================================
        $jVokal    = Jenis::create(['nama_jenis' => 'Vokal']);
        $jKonsonan = Jenis::create(['nama_jenis' => 'Konsonan']);
        $jGabungan = Jenis::create(['nama_jenis' => 'Gabungan']);

        // ==========================================
        // 2. BUAT 3 MODUL BELAJAR
        // ==========================================
        Modul::create(['id_jenis' => $jVokal->id_jenis, 'nama_modul' => 'Modul 1: Huruf Vokal Dasar']);
        Modul::create(['id_jenis' => $jKonsonan->id_jenis, 'nama_modul' => 'Modul 2: Huruf Konsonan Dasar']);
        Modul::create(['id_jenis' => $jGabungan->id_jenis, 'nama_modul' => 'Modul 3: Gabungan Huruf (Membaca Kata)']);

        // ==========================================
        // 3. INPUT DATA JAMO (HURUF)
        // ==========================================

        // --- A. Vokal Dasar (10 Huruf) ---
        // Kita masukkan ke kategori $jVokal
        $vData = [
            ['ㅏ', 'a'], ['ㅑ', 'ya'], ['ㅓ', 'eo'], ['ㅕ', 'yeo'],
            ['ㅗ', 'o'], ['ㅛ', 'yo'], ['ㅜ', 'u'], ['ㅠ', 'yu'],
            ['ㅡ', 'eu'], ['ㅣ', 'i']
        ];

        foreach($vData as $v) {
            Jamo::create([
                'hangeul'   => $v[0], 
                'pelafalan' => $v[1], 
                'id_jenis'  => $jVokal->id_jenis
            ]);
        }

        // --- B. Konsonan Dasar (14 Huruf) ---
        // Kita masukkan ke kategori $jKonsonan
        $kData = [
            ['ㄱ', 'g/k'], ['ㄴ', 'n'], ['ㄷ', 'd/t'], ['ㄹ', 'r/l'],
            ['ㅁ', 'm'], ['ㅂ', 'b/p'], ['ㅅ', 's'], ['ㅇ', 'ng (silent)'],
            ['ㅈ', 'j'], ['ㅊ', 'ch'], ['ㅋ', 'k'], ['ㅌ', 't'],
            ['ㅍ', 'p'], ['ㅎ', 'h']
        ];

        foreach($kData as $k) {
            Jamo::create([
                'hangeul'   => $k[0], 
                'pelafalan' => $k[1], 
                'id_jenis'  => $jKonsonan->id_jenis
            ]);
        }

        // ==========================================
        // 4. INPUT DATA KATA (UNTUK MODUL GABUNGAN)
        // ==========================================
        // Contoh kata sederhana tanpa huruf rangkap untuk pemula

        // Ambil ID huruf yang dibutuhkan untuk relasi pivot
        $n = Jamo::where('hangeul', 'ㄴ')->first();
        $u = Jamo::where('hangeul', 'ㅜ')->first();
        $a = Jamo::where('hangeul', 'ㅏ')->first();
        $m = Jamo::where('hangeul', 'ㅁ')->first();
        $o = Jamo::where('hangeul', 'ㅇ')->first();
        $yu = Jamo::where('hangeul', 'ㅠ')->first();
        $i = Jamo::where('hangeul', 'ㅣ')->first();

        // Kata 1: Nuna (누나 - Kakak Perempuan)
        // Gabungan: n + u + n + a
        $kata1 = Kata::create([
            'hangeul' => '누나', 
            'arti' => 'Kakak Perempuan',
        
        ]);
        
        // Relasi Pivot (Menyusun huruf pembentuk kata)
        if($n && $u && $a) {
            $kata1->hangeul()->attach([
                $n->id_jamo, 
                $u->id_jamo, 
                $n->id_jamo, 
                $a->id_jamo
            ]);
        }

        // Kata 2: Namu (나무 - Pohon)
        // Gabungan: n + a + m + u
        $kata2 = Kata::create(['hangeul' => '나무', 'arti' => 'Pohon']);
        if($n && $a && $m && $u) {
            $kata2->hangeul()->attach([
                $n->id_jamo, 
                $a->id_jamo, 
                $m->id_jamo, 
                $u->id_jamo
            ]);
        }

        // Kata 3: Uyu (우유 - Susu)
        // Gabungan: ng(silent) + u + ng(silent) + yu
        $kata3 = Kata::create(['hangeul' => '우유', 'arti' => 'Susu']);
        if($o && $u && $yu) {
            $kata3->hangeul()->attach([
                $o->id_jamo, 
                $u->id_jamo, 
                $o->id_jamo, 
                $yu->id_jamo
            ]);
        }
        
        // Kata 4: Ai (아이 - Anak)
        // Gabungan: ng(silent) + a + ng(silent) + i
        $kata4 = Kata::create(['hangeul' => '아이', 'arti' => 'Anak kecil']);
        if($o && $a && $i) {
            $kata4->hangeul()->attach([
                $o->id_jamo, 
                $a->id_jamo, 
                $o->id_jamo, 
                $i->id_jamo
            ]);
        }
    }
}