<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $fillable = [
        'id_pertanyaan',
        'id_user',
        'tanggal',
        'jawaban',

    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}