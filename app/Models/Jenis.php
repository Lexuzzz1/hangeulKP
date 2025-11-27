<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis'; 
    
    protected $fillable = [
        'nama_jenis',
    ];
    
    public function hangeul()
    {
        return $this->hasMany(Jamo::class, 'id_jenis'); // Ubah Hangeul jadi Jamo (sesuai nama model baru)
    }

    public function modul()
    {
        return $this->hasMany(Modul::class, 'id_jenis');
    }
}