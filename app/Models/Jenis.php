<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $fillable = [
        'id_jenis',
        'nama_jenis',
    ];
    
    public function hangeul()
    {
        return $this->hasMany(Hangeul::class);
    }

}