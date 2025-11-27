<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progres';
    protected $primaryKey = 'id_progres';
    
    protected $fillable = [
        'id_progres', 
        'id_modul', 
        'id_user', 
        'presentase_progres', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'id_modul');
    }
}