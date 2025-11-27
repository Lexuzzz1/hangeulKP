<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    protected $primaryKey = 'id_modul'; 
    
    protected $fillable = [
        'id_jenis',    
        'nama_modul', 
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_modul');
    }

    public function progres()
    {
        return $this->hasMany(Progres::class, 'id_modul');
    }
}