<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable = [
        'id_pertanyaan',
        'soal',
        'a',
        'b',
        'c',
        'd',
        'jawaban',
        'bobot',

    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'jawaban', 'id_user', 'id_pertanyaan')
        ->withPivot('jawaban', 'tanggal')
        ->withTimeStamp();

    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}