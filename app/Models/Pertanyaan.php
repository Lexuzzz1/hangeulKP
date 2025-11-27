<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    

    protected $primaryKey = 'id_pertanyaan'; 
    
    protected $fillable = [
        'id_pertanyaan', 
        'id_modul', 
        'soal', 
        'a', 'b', 'c', 'd', 
        'jawaban', 
        'bobot'
    ];

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'id_modul');
    }

    public function jawabanUser()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }
}