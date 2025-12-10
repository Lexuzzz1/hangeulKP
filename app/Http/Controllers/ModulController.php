<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Kata; // Tambahkan ini

class ModulController extends Controller
{
    public function index()
    {
    
        $moduls = Modul::with(['jenis.hangeul'])->get();
        
        $katas = Kata::all(); 

        return view('modul.index', compact('moduls', 'katas'));
    }
}