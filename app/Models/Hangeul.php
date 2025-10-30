<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hangeul extends Model
{
    protected $table = 'hangeul';
    protected $fillable = [
        'id_hangeul',
        'hangeul',
        'pelafalan',
        'id_jenis',

    ];
    public function kata()
    {
        return $this->belongsToMany(Kata::class , 'hangeul_kata', 'id_kata', 'id_hangeul')->withTimestamps(); 
    }

    public function jenis()
    {
        return $this->belongsTo(Kata::class); 
    }
}