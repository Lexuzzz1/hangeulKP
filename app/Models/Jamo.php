<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jamo extends Model
{
    protected $table = 'jamo'; 
    protected $primaryKey = 'id_jamo'; 
    
    protected $fillable = [
        'id_jamo', 
        'hangeul', 
        'pelafalan', 
        'id_jenis'
    ];


    public function kata()
    {
        return $this->belongsToMany(Kata::class, 'jamo_kata', 'id_jamo', 'id_kata');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
}