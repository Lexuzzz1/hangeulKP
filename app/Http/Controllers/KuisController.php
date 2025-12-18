<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Progres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    public function index()
    {
        $moduls = Modul::with('jenis')->get();
        return view('kuis.index', compact('moduls'));
    }

    public function show($id_modul)
    {
        $modul = Modul::findOrFail($id_modul);
        $pertanyaans = Pertanyaan::where('id_modul', $id_modul)->get();
        
        if ($pertanyaans->isEmpty()) {
            return back()->with('error', 'Modul ini belum memiliki pertanyaan');
        }

        return view('kuis.kuis', compact('modul', 'pertanyaans'));
    }

    public function submit(Request $request, $id_modul)
    {
        $user = Auth::user();
        $pertanyaans = Pertanyaan::where('id_modul', $id_modul)->get();
        
        $score = 0;
        $total = $pertanyaans->count();
        $answers = [];

        // Simpan jawaban pengguna
        foreach ($pertanyaans as $pertanyaan) {
            $jawaban_user = $request->input('jawaban_' . $pertanyaan->id_pertanyaan);
            
            if ($jawaban_user) {
                // Cek apakah jawaban benar
                if ($jawaban_user === $pertanyaan->jawaban) {
                    $score += $pertanyaan->bobot ?? 1;
                }

                // Simpan jawaban ke database
                Jawaban::create([
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'id_user' => $user->id_user,
                    'tanggal' => now(),
                    'jawaban' => $jawaban_user,
                ]);

                $answers[] = [
                    'pertanyaan' => $pertanyaan->soal,
                    'jawaban_user' => $jawaban_user,
                    'jawaban_benar' => $pertanyaan->jawaban,
                    'benar' => $jawaban_user === $pertanyaan->jawaban
                ];
            }
        }

        // Hitung persentase
        $total_score = $pertanyaans->sum('bobot') ?? $total;
        $percentage = ($score / $total_score) * 100;

        // Simpan progress
        Progres::create([
            'id_user' => $user->id_user,
            'id_modul' => $id_modul,
            'presentase_progres' => $percentage,
            'tanggal' => now(),
        ]);

        // Ambil data modul
        $modul = Modul::findOrFail($id_modul);

        return view('kuis.result', compact('modul', 'score', 'total_score', 'percentage', 'answers'));
    }

    public function history()
    {
        $user = Auth::user();
        $histories = Progres::with('modul')
            ->where('id_user', $user->id_user)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('kuis.history', compact('histories'));
    }
}
